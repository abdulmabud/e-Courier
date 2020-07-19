@extends('master')

@section('title')
    Location List
@endsection

@section('content')
    <div class="container">
        <h2 class="text-primary d-inline">List of Location</h2>
       <a href="{{ route('location.create') }}"><button class="btn btn-primary float-right">Add New Location</button></a>
       <hr> 
       <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Created Date</td>
                    <td>Name</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                <tr>
                    <td>{{ $location->id }}</td>
                    <td>{{ date_format($location->created_at, 'd-M-y h:i a') }}</td>
                    <td>{{ $location->name }}</td>
                    <td>{!! $location->status == 1 ?'<span style="padding: 3px 9px; color: white; border-radius: 5px;" class="bg-success">Publish</span>':'<span style="padding: 3px 9px; color: white; border-radius: 5px;" class="bg-danger">Unpublish</span>' !!}</td>
                    <td><a href="{{ route('location.edit', $location->id) }}" class="btn btn-primary">Edit</a></td>
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
@endsection