@extends('master')

@section('title')
    Place New Order
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h4 class="text-primary text-center">Customer Details</h4>
                <form action="" class="form-group">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="sname" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><input type="text" name="sphone" class="form-control"></td>
                    </tr>
                </table>
                <h4 class="text-primary text-center">Receiver Person Details</h4>
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="rname" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><input type="text" name="rphone" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <select name="address" class="form-control">
                                <option value="Dhaka">Dhaka</option>
                                <option value="Meherpur">Meherpur</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <h4 class="text-primary text-center">Others</h4>
                <table class="table">
                    <tr>
                        <td>Product Details</td>
                        <td><textarea name="product_details" rows="4" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td>Service Charge</td>
                        <td><input type="text" name="service_charge" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Payment Staus</td>
                        <td>
                            <select name="payment-status" class="form-control">
                                <option value="Paid">Paid</option>
                                <option value="Due">Due</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Reference Id</td>
                        <td><input type="text" name="ref_id" class="form-control"></td>
                    </tr>
                </table>
                <input type="submit" value="Place New Order" class="btn btn-primary btn-block">
            </form>
            </div>
        </div>
    </div>
@endsection