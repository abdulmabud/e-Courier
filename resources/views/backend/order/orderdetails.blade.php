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
            <form action="" method="POST" id="statusForm">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <td>Order Status</td>
                        <td>
                            <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                            <select name="order_status" id="order-status" class="form-control">
                                <option value="Pending">Pending</option>
                                <option value="Accepted">Accepted</option>
                                <option value="Picked Up">Picked Up</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Rescheduled">Rescheduled</option>
                                <option value="Done">Done</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-primary" value="Change Order Status"></td>
                    </tr>
                </table>
                <span id="result" class="text-primary"></span>
            </form>
        </div>
    </div>
</div>
@endsection

@section('customjs')

    <script>
        $('#statusForm').submit(function(e){
            e.preventDefault();
            var order_id = $('#order_id').val();
            var order_status = $('#order-status').val();
            $.ajax({
                url: '{{ route("order.statuschange") }}',
                method: 'POST',
                data: {order_id: order_id, order_status: order_status, _token: '{{ csrf_token() }}' },
                cache: false,
                success: function(data){
                   $('#result').text('Status Changed to '+order_status);
                }
            });
        });
    </script>
@endsection
