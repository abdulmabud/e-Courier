@extends('master')

@section('title')
    Order
@endsection

@section('content')
    <div class="container">
        <h2 class="text-primary d-inline">List of order</h2>
       <a href="{{ route('order.create') }}"><button class="btn btn-primary float-right">Place New Order</button></a>
       <hr> 
       <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Created Date</td>
                    <td>Order Id</td>
                    <td>R. Name</td>
                    <td>R. Phone</td>
                    <td>Charge</td>
                    <td>Payment</td>
                    <td>Ref_id</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ date_format($order->created_at, 'd-M-y h:i a') }}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->receiver_name }}</td>
                    <td>{{ $order->receiver_phone }}</td>
                    <td>{{ $order->service_charge }}</td>
                    <td>{!! $order->payment_status=='Paid'?'<span style="padding: 3px 9px; color: white; border-radius: 5px;" class="bg-success">Paid</span>':'<span style="padding: 3px 9px; color: white; border-radius: 5px;" class="bg-danger">Due</span>' !!}</td>
                    <td>{{ $order->ref_id }}</td>
                    <td><a href="{{ route('order.show', $order->id) }}" class="btn btn-primary">Details</a></td>
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
@endsection