<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $jobs = $user->jobs()->get();
        return view('jobs.index',compact('jobs', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
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
            
            $job = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'department'=>'required|string|max:255',
                'qualifications'=>'required|string|max:255'
            ]);
            $job['user_id'] = Auth::id();
            Job::create($job);
            return redirect()->route('jobs.index')->with('success','Job position created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['addJob'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
       try {
        $updatedJob = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'department'=>'required|string|max:255',
            'qualifications'=>'required|string|max:255'
        ]);
        $job->update($updatedJob);
        return view('jobs.index')->with(['success'=>'Job updated successfully!']);
       } catch (\Exception $e) {
        return back()->withErrors(['updateJob'=> $e->getMessage()]);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return view('jobs.index')->with(['success'=>'Job deleted!']);
    }
}
