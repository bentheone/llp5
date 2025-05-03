@extends('layout')
@section('title', 'Report')
@section('content')
    <div class="main">
        <h2>Daily Applications Report</h2>

<form method="GET" action="{{ route('report.daily') }}">
    <label for="date">Select Date:</label>
    <input type="date" name="date" id="date" value="{{ $date ?? '' }}" required>
    <button type="submit">Generate Report</button>
</form>

<hr>

@if($date)
    <h3>Report for: {{ $date }}</h3>

    @if($applications->isEmpty())
        <p>No applications found on this date.</p>
    @else
    <div class="table">
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Applicant</th>
                    <th>Job Title</th>
                    <th>Stage</th>
                    <th>Applied On</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $app)
                    <tr>
                        <td>{{ $app->applicant->fname }} {{ $app->applicant->lname }}</td>
                        <td>{{ $app->job->title }}</td>
                        <td>{{ $app->stage->name ?? 'No Stage' }}</td>
                        <td>{{ $app->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
    @endif
@endif
    </div>
@endsection