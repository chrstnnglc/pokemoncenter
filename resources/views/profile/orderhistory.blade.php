@extends('layouts.app')

@section('title')
    <title>Pokemon Center | Store</title>
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h1>Order History</h1>
                </div>

                <div class="panel-body">
				    @foreach ($user->orders as $order)
                        @foreach ($orders->orderdetails as $orderdetail)
                    @endforeach
                </div>
        </div>
    </div>
</div>
@stop