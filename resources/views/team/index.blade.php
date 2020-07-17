@extends('master')

@section('title')
    Team
@endsection

@section('content')
    <div class="container">
        <h3 class="d-inline text-primary">Team Member List</h3>
        <a href="{{ route('team.add') }}" class="float-right btn btn-primary">Add new Team Member</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td>{{ $team->id }}</td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->phone }}</td>
                        <td>{{ $team->email }}</td>
                        <td>{{ $team->role }}</td>
                        <td>
                            <a href="{{ route('team.edit', $team->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('team.destroy', $team->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection