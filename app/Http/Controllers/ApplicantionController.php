<?php

namespace App\Http\Controllers;

use App\Models\Applicantion;
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
        $applicantions = $user->applicantions()->get();
        return view('applicantions.index', compact('applicantions', 'user'));
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
        return view('applicantions.create', compact('jobs', 'applicants'));
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
            
            $applicantion = $request->validate([
                'job_id' => 'required',
                'applicant_id'=>'required',
                'status'=>'required|string|max:255',
                'reviewDate'=>'required|date|before_or_equal:today'
            ]);
            $applicantion['user_id'] = Auth::id(); 
            Applicantion::create($applicantion);
            return redirect()->route('applicantions.index')->with(['success'=>'Applciation created']);
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
        $user = Auth::user();
        $jobs = $user->jobs()->get();
        $applicants = $user->applicants()->get();
        return view('applicantions.edit', compact('jobs', 'applicants', 'applicantion'));
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
         $updatedApplicantion = $request->validate([
            'job_id' => 'required',
                'applicant_id'=>'required',
                'status'=>'required|string|max:255',
                'reviewDate'=>'required|date|before_or_equal:today'
        ]);

        $applicantion->update($updatedApplicantion);
        return redirect()->route('applicantions.index')->with(['success'=>'Applicantion updated!']);
    } catch (\Exception $e){
        return back()->withErrors(['updateApplicantion'=>$e->getMessage()]);

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
        return back()->with(['success'=>'Applicantion deleted!']);
    }
}
