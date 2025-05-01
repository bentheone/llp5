@extends('layout')
@section('title', 'Dashboard')
@section('content')
    <div class="main">
        <div class="greeting">
            <h3>Hello {{Auth::user()->name}}!</h3>
            <p>Here is your dashboard</p>
        </div>
        <div class="cards">
            <div class="card">
                <h2>{{$totalJobs}}</h2>
                <p>Jobs</p>
            </div>
            <div class="card">
                <h2>{{$totalApplicants}}</h2>
                <p>Applicants</p>
            </div>
            <div class="card">
                <h2>{{$totalApplications}}</h2>
                <p>Applications</p>
            </div>
            <div class="card">
                <h2>{{$totalStages}}</h2>
                <p>Recruitment stages</p>
            </div>
        </div>
    </div>
@endsection