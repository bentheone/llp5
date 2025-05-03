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
            <h3>Edit Stage Details</h3>
            <form action="{{route('stages.update', $stage)}}" method="post">
                @csrf
                @method('PUT')
            <div class="input-group">
                <label for="application">Application</label>
                <select name="apption_id" id="application_id">
                    <option value="">Select Application ---</option>
                    @foreach ($applications as $application)
                    <option value="{{$application->id}}" {{old('applicantion_id', $stage->applicantion->id) == $application->id ? 'selected' : ''}}>
                        {{$application->applicant->fname}} on {{$application->job->title}}
                    </option>
                    @endforeach 
                </select>
            </div>
            
            <div class="input-group">
                <label for="Name">Name</label>
                <input type="text" name="name" id="name" value="{{old('name', $stage->name)}}" required>
            </div>
            <div class="input-group">
                <div class="radios">
                    <input type="radio" name="status" value="active" {{($stage->status) == 'active' ? 'checked' : ''}}>Active
                    <input type="radio" name="status" value="inactive" {{($stage->status) == 'inactive' ? 'checked' : ''}}>Inactive
                    <input type="radio" name="status" value="complete" {{($stage->status) == 'complete' ? 'checked' : ''}}>Complete
                </div>
            </div>
            <div class="input-group">
                <label for="completionDate">Completion Date Date</label>
                <input type="date" name="completionDate" id="completionDate" value="{{old('completionDate', $stage->completionDate)}}">
            </div>
            <button type="submit">Update Stage</button>
        </form>
        </div>
    </div>
@endsection