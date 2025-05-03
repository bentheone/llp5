@extends('layout')
@section('title', 'Applicantions')
@section('content')
    <div class="main">
        <div class="header">
            <h3>All Applicantions!</h3>
            <button><a href="/applicantions/create">Add New Applicantion +</a></button>
        </div>
        <div class="table">
            <table >
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Applicant Name</th>
                        <th>Status</th>
                        <th>Review Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applicantions as $applicantion)
                        <tr>
                            <td>{{$applicantion->job->title}}</td>
                            <td>{{$applicantion->applicant->fname}}</td>
                            <td>{{$applicantion->status}}</td>
                            <td>{{$applicantion->reviewDate}}</td>
                            <td class="actions">
                                <a href="{{route('applicantions.edit', $applicantion->id)}}">Edit</a>
                                <form action="{{route('applicantions.destroy' ,$applicantion)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="5">No applicantions to show!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection