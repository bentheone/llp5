<?php

namespace App\Http\Controllers;

use App\Models\Applicantion;
use Illuminate\Console\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $applications = $user->applicantions()->get();
        return view('applications.index', compact('applications', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $jobs = $user->jobs()->get();
        $applicants = $user->applicants()->get();
        return view('applications.create', compact('jobs', 'applicants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
            $application = $request->validate([
                'job_id' => 'required',
                'applicant_id'=>'required',
                'status'=>'required|string|max:255',
                'reviewDate'=>'required|date|before_or_equal:today'
            ]);

            Applicantion::create($application);
            return view('applications.index')->with(['success'=>'Applciation created']);
        } catch (\Exception $e) {
            return back()->withErrors(['addApplicant'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicantion  $applicantion
     * @return \Illuminate\Http\Response
     */
    public function show(Applicantion $applicantion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicantion  $applicantion
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicantion $applicantion)
    {
        return view('applications.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicantion  $applicantion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicantion $applicantion)
    {
       try {
         $updatedApplication = $request->validate([
            'job_id' => 'required',
                'applicant_id'=>'required',
                'status'=>'required|string|max:255',
                'reviewDate'=>'required|date|before_or_equal:today'
        ]);

        $applicantion->update($updatedApplication);
    } catch (\Exception $e){
        return view('applications.index')->with(['success'=>'Application updated!']);
        return back()->withErrors(['updateApplication'=>$e->getMessage()]);

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicantion  $applicantion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicantion $applicantion)
    {
        $applicantion->delete();
        return back()->with(['success'=>'Application deleted!']);
    }
}
