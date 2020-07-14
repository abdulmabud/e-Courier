@extends('master')

@section('title')
    
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-primary text-center">Customer Details</h4>
                    @csrf
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td>{{ $order->customer_name }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $order->customer_phone }}</td>
                    </tr>
                </table>
                <h4 class="text-primary text-center">Receiver Person Details</h4>
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td>{{ $order->receiver_name }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $order->receiver_phone }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $order->receiver_address }}</td>
                    </tr>
                </table>
                <h4 class="text-primary text-center">Others</h4>
                <table class="table">
                    <tr>
                        <td>Product Details</td>
                        <td>{{ $order->product_details }}</td>
                    </tr>
                    <tr>
                        <td>Service Charge</td>
                        <td>{{ $order->service_charge }}</td>
                    </tr>
                    <tr>
                        <td>Payment Staus</td>
                        <td>
                            <select name="payment_status" class="form-control">
                                <option {{ $order->payment_status == 'Paid'?'Selected':'' }} value="Paid">Paid</option>
                                <option {{ $order->payment_status == 'Due'?'Selected':'' }} value="Due">Due</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Reference Id</td>
                        <td>{{ $order->ref_id }}</td>
                    </tr>
                    <tr>
                        <td>Note</td>
                        <td>{{ $order->note }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h4 class="text-center text-primary">Control Order</h4>
                <hr>
                <h5 class="text-primary">Change Order Status</h5>
                <table class="table table-bordered">
                    <tr>
                        <td>Order Status</td>
                        <td>
                            <select name="order_status" class="form-control">
                                <option value="Pending">Pending</option>
                                <option value="Assigned">Assigned</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-primary" value="Change Order Status"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection