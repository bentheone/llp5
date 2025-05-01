@extends('layout')
@section('title', 'Applicants')
@section('content')
    <div class="main">
        <div class="header">
            <h3>All Stages!</h3>
            <button><a href="/stages/create">Add New Stage +</a></button>
        </div>
        <div class="table">
            <table >
                <thead>
                    <tr>
                        <th>Application</th>
                        <th> Name</th>
                        <th>Status</th>
                        <th>Completion Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stages as $stage)
                        <tr>
                            <td>{{$stage->application_id}}</td>
                            <td>{{$stage->name}}</td>
                            <td>{{$stage->status}}</td>
                            <td>{{$stage->completionDate}}</td>
                            <td class="actions">
                                <a href="{{route('stages.edit', $stage)}}">Edit</a>
                                <form action="{{route('stages.destroy', $stage)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="5">No stages to show!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection