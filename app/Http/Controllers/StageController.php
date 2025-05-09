<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $stages = $user->stages()->get();
        return view('stages.index', compact('stages', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $applications = $user->applicantions()->get();
        return view('stages.create', compact('applications'));

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
            
            $stage = $request->validate([
                'applicantion_id'=>'required',
                'name'=>'required|string|max:255',
                'status'=>'required|string|max:255',
                'completionDate' => 'nullable|date|before_or_equal:today'
            ]);

            $stage['user_id'] = Auth::id();
            Stage::create($stage);
            
            return redirect()->route('stages.index')->with(['success'=>'Stage created!']);
        } catch (\Exception $e) {
            return back()->withErrors(['addStage' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage)
    {
        $user = Auth::user();
        $applications = $user->applicantions()->get();
        return view('stages.edit', compact('stage', 'applications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stage $stage)
    {
        try{
        $updatedStage = $request->validate([
            'application_id'=>'required',
            'name'=>'required|string|max:255',
            'status'=>'required|string|max:255',
            'completionDate' => 'date|before_or_equal:today'
        ]);

        $stage->update($updatedStage);
        return redirect()->route('stages.index')->with(['success'=> 'Stage updated']);
       }catch( \Exception $e) {
        return back()->withErrors(['updateStage' => $e->getMessage()]);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage)
    {
        $stage->delete();
        return back()->with(['success' => 'Stage deleted!']);
    }
}
