@extends('layouts.app')

@section('title')
    <title>Cart | Pokémon Center</title>
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h1>Cart</h1>
                </div>

                <div class="panel-body">
                    
                    @if ($order == NULL or $order->orderdetails->count() == 0)
                        <a href="/store">Go shopping!</a> LOL
                    @else
                        <table>
                            <tr>
                                <th>Pokemon</th>
                                <th>Price Each</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th colspan=2>Action</th>
                            </tr>

                            @foreach ($order->orderdetails as $orderdetail)
                                <tr>
                                    <form method="POST" action="/cart">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}

                                        <td>{{ $orderdetail->pokemonname }}</td>
                                        <td>{{ $orderdetail->priceeach }}</td>
                                        <td><input type="text" name="quantity" value={{ $orderdetail->quantity }}>
                                            <input type="hidden" name="id" value={{ $orderdetail->id }}></td>
                                        <td>{{ $orderdetail->quantity * $orderdetail->priceeach }}</td>
                                        <td>
                                            <button type="submit">Edit</button>
                                        </td>
                                    </form>

                                    <form method="POST" action="/cart">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}

                                        <input type="hidden" name="id" value={{ $orderdetail->id }}>
                                        <td><button type="submit">Delete</button></td>
                                    </form>
                                </tr>                          
                            @endforeach

                            <tr>
                                <td colspan=6>Total: {{ $order->total }}</td>
                            </tr>
                            <!-- CHECKOUT BUTTON HERE -->

                            <form method="POST" action="/cart/success">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}

                                <input type="hidden" name="id" value={{ $order->id }}>
                                <td><button type="submit">Checkout</button></td>
                            </form>
                        </table>
                    @endif
				</div>
        </div>
    </div>
</div>
@stop