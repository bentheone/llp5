@extends('layout')
@section('title', 'Applicants')
@section('content')
    <div class="main">
        <div class="header">
            <h3>All Applicants!</h3>
            <button><a href="/applicants/create">Add New Applicant +</a></button>
        </div>
        <div class="table">
            <table >
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Application Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applicants as $applicant)
                        <tr>
                            <td>{{$applicant->fname}}</td>
                            <td>{{$applicant->lname}}</td>
                            <td>{{$applicant->email}}</td>
                            <td>{{$applicant->cnumber}}</td>
                            <td>{{$applicant->applicationDate}}</td>
                            <td class="actions">
                                <a href="{{route('applicants.edit', $applicant)}}">Edit</a>
                                <form action="{{route('applicants.destroy', $applicant)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="5">No applicants to show!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection