@extends('master')

@section('title')
    Add Team
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="text-center text-primary">Add New Team Member</h3>
               <form action="{{ route('team.store') }}" method="post" class="form-groupo">
                   @csrf
                    <table class="table table-bordered">
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" name="phone" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td><select name="role" class="form-control">
                                <option value="Role 1">Role 1</option>    
                            </select></td>
                        </tr>
                    </table>
                    <input type="submit" value="Add Team Member" class="btn btn-block btn-primary">
               </form>
            </div>
        </div>
    </div>
@endsection