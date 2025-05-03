@extends('layout')
@section('title', 'Add Job')
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
            <h3>Edit Job Details</h3>
            <form action="{{route('jobs.update', $job)}}" method="post">
                @csrf
                @method('PUT')
            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{old('title',$job->title)}}" id="title" required>
            </div>
            <div class="input-group">
                <label for="Department">Department</label>
                <input type="text" name="department" value="{{old('department',$job->department)}}" id="department" required>
            </div>
            <div class="input-group">
                <label for="description">Description</label>
                <input type="text" name="description" value="{{old('description',$job->description)}}" id="description" required>
            </div>
            <div class="input-group">
                <label for="qualifications">Qualifications</label>
                <input type="text" name="qualifications" value="{{old('qualifications',$job->qualifications)}}" id="qualifications" required>
            </div>
            <button type="submit">Update  job</button>
        </form>
        </div>
    </div>
@endsection