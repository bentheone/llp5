<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $applicants = $user->applicants()->get();
        return view('applicants.index', compact('applicant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applicants.create');
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
            $applicant = $request->validate([
                'fname'=>'required|string|max:255',
                'lname'=>'required|string|max:255',
                'email'=>'required|string|email|max:255',
                'cnumber' => 'required|numeric|starts_with:0|digits:10',
                'applicationDate'=>'required|date|before_or_equal:today'
            ]);

            Applicant::create($applicant);
            return view('applicants.index')->with(['success'=>'Applicant created!']);
        } catch (\Exception $e) {
            return back()->withErrors(['createApplicant'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        return view('applicants.edit', compact('applicant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        try {
            $updatedApplicant = $request->validate([
                'fname'=>'required|string|max:255',
                'lname'=>'required|string|max:255',
                'email'=>'required|string|email|max:255',
                'cnumber' => 'required|numeric|starts_with:0|digits:10',
                'applicationDate'=>'required|date|before_or_equal:today'
            ]);

            $applicant->update($updatedApplicant);
            return view('applicant.index')->with(['success'=>'Applicant updated!']);
        } catch (\Exception $e) {
            return back()->withErrors(['updateJob'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
      $applicant->delete();
      return view('applicant.index')->with(['success'=>'Applicant deleted!']);
    }
}
