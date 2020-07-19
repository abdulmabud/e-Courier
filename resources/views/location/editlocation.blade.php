@extends('master')

@section('title')
    Update Location
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="text-center text-primary">Update Location</h3>
               <form action="{{ route('location.update', $location->id) }}" method="post" class="form-groupo">
                   @csrf
                   @method('PUT')
                    <table class="table table-bordered">
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name" value="{{ $location->name }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="status" class="form-control">
                                    <option value="1">Publish</option>
                                    <option value="0" {{ $location->status == 0 ?'Selected':''  }}>Unpublish</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="Update Location" class="btn btn-block btn-primary">
               </form>
            </div>
        </div>
    </div>
@endsection