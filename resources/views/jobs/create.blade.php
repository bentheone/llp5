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
            <h3>Enter new Job Details</h3>
            <form action="{{route('jobs.store')}}" method="post">
                @csrf
            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="input-group">
                <label for="Department">Department</label>
                <input type="text" name="department" id="department" required>
            </div>
            <div class="input-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" required>
            </div>
            <div class="input-group">
                <label for="qualifications">Qualifications</label>
                <input type="text" name="qualifications" id="qualifications" required>
            </div>
            <button type="submit">Add job</button>
        </form>
        </div>
    </div>
@endsection