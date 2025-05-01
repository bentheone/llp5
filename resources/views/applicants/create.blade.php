@extends('layout')
@section('title', 'Add Applicant')
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
            <h3>Enter new Applicant Details</h3>
            <form action="{{route('applicants.store')}}" method="post">
                @csrf
            <div class="input-group">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" required>
            </div>
            <div class="input-group">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" required>
            </div>
            <div class="input-group">
                <label for="Email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="input-group">
                <label for="cnumber">Contact number</label>
                <input type="text" name="cnumber" id="cnumber" required>
            </div>
            <div class="input-group">
                <label for="applicationDate">Application Date</label>
                <input type="date" name="applicationDate" id="applicationDate" required>
            </div>
            <button type="submit">Add Applicant</button>
        </form>
        </div>
    </div>
@endsection