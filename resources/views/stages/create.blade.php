@extends('layout')
@section('title', 'Add Stage')
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
            <h3>Enter new Stage Details</h3>
            <form action="{{route('stages.store')}}" method="post">
                @csrf
            <div class="input-group">
                <label for="application">Application</label>
                <select name="application_id" id="application_id">
                    <option value="">Select Application ---</option>
                    @foreach ($applications as $application)
                    <option value="{{$application->id}}">{{$application->id}}</option>
                    @endforeach 
                </select>
            </div>
            
            <div class="input-group">
                <label for="Name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="input-group">
                <div class="radios">
                    <input type="radio" name="status" value="active">Active
                    <input type="radio" name="status" value="inactive">Inactive
                    <input type="radio" name="status" value="complete">Complete
                </div>
            </div>
            <div class="input-group">
                <label for="completionDate">Completion Date Date</label>
                <input type="date" name="completionDate" id="completionDate" required>
            </div>
            <button type="submit">Add Stage</button>
        </form>
        </div>
    </div>
@endsection