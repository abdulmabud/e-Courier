@extends('master')

@section('title')
    Order
@endsection

@section('content')
    <div class="container">
        <h2 class="text-primary d-inline">List of order</h2>
       <a href="{{ route('order.create') }}"><button class="btn btn-primary float-right">Place New Order</button></a>
    </div>
@endsection