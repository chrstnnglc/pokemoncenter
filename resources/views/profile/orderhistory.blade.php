@extends('layouts.app')

@section('title')
    <title>Order History | Pokémon Center</title>
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
                    @if ($orders == NULL or $orders->get()->count() == 0)
                        You haven't made any orders yet.
                    @else
                        <table>
                            @foreach ($orders->get() as $order)
                                <tr>
                                    <td colspan=2><h4>Order #{{ $order->id }}</h4></td>
                                    <td colspan=2><h4>{{ $order->orderdate }}</h4></td>
                                </tr>

                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price each</th>
                                    <th>Total</th>
                                </tr>
                                @foreach ($order->orderdetails()->get() as $orderdetail)

                                    <tr>
                                        <td>{{ $orderdetail->pokemonname }}</td>
                                        <td>{{ $orderdetail->quantity }}</td>
                                        <td>{{ $orderdetail->priceeach }}</td>
                                        @if ($orderdetail->id == $order->orderdetails()->first()->id)
                                            <th rowspan= {{ $order->orderdetails()->get()->count() }}>{{ $order->total }}</th>
                                        @endif
                                    </tr>
                                @endforeach
                                <tr></tr>
                            @endforeach
                        </table>
                    @endif
                </div>
        </div>
    </div>
</div>
@stop