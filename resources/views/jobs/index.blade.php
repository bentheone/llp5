@extends('layout')
@section('title', 'Jobs')
@section('content')
    <div class="main">
        <div class="header">
            <h3>All Jobs!</h3>
            <button><a href="/jobs/create">Add New Job +</a></button>
        </div>
        <div class="table">
            <table >
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Department</th>
                        <th>Description</th>
                        <th>Qualifications</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                        <tr>
                            <td>{{$job->title}}</td>
                            <td>{{$job->department}}</td>
                            <td>{{$job->description}}</td>
                            <td>{{$job->qualifications}}</td>
                            <td class="actions">
                                <a href="{{route('jobs.edit', $job)}}">Edit</a>
                                <form action="{{route('jobs.destroy', $job)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="5">No jobs to show!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection