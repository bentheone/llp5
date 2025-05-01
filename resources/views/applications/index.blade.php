@extends('layout')
@section('title', 'Applications')
@section('content')
    <div class="main">
        <div class="header">
            <h3>All Applications!</h3>
            <button><a href="/applications/create">Add New Application +</a></button>
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
                    @forelse ($applications as $application)
                        <tr>
                            <td>{{$application->jobs()->name}}</td>
                            <td>{{$application->applicants()->fname}}</td>
                            <td>{{$application->status}}</td>
                            <td>{{$application->reviewDate}}</td>
                            <td class="actions">
                                <a href="{{route('applications.edit', $application)}}">Edit</a>
                                <form action="{{route('applications.destroy' ,$application)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="5">No applications to show!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection