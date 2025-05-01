@extends('layout')
@section('title', 'Add Application')
@section('content')
    <div class="main">
        <div class="form-container">
            @if ($errors->any())
                <ul class="errors">
                @foreach ($errors->all() as $error)
                   <li> {{$error}}</li> 
                @endforeach
                 </ul>
            @endif
            <h3>Enter new Application Details</h3>
            <form action="{{route('applications.store')}}" method="post">
                @csrf
            <div class="input-group">
                <label for="job">Job</label>
                <select name="job_id" id="job_id">
                    <option value="">Select Job ---</option>
                    @foreach ($jobs as $job)
                    <option value="{{$job->id}}">{{$job->title}}</option>
                    @endforeach 
                </select>
            </div>
            <div class="input-group">
                <label for="applicant">Applicant</label>
                <select name="applicant_id" id="applicant_id">
                    <option value="">Select Applicant ---</option>
                    @foreach ($applicants as $applicant)
                    <option value="{{$applicant->id}}">{{$applicant->title}}</option>
                    @endforeach 
                </select>
            </div>
            <div class="input-group">
                <label for="Status">Status</label>
                <div class="radios">
                    <input type="radio" name="status" id="status" value="accepted" required> Accepted
                <input type="radio" name="status" id="status" value="denied" required> Denied
                <input type="radio" name="status" id="status" value="pending" required> Pending
                </div>
            </div>
            <div class="input-group">
                <label for="reviewDate">Review Date</label>
                <input type="date" name="reviewDate" id="reviewDate" required>
            </div>
            <button type="submit">Add Application</button>
        </form>
        </div>
    </div>
@endsection