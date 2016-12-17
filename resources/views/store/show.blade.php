@extends('layouts.app')

@section('title')
    <title>{{ $pokemon->name }} | Pokémon Center</title>
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h1>{{ $pokemon->id }} : {{ $pokemon->name }}</h1>
                </div>

                <div class="panel-body">
				    <h3>Php {{ $pokemon->priceeach }} ({{ $pokemon->stock }} in stock)</h3>

				    <h4>Type: {{ $pokemon->type }}</h4>
				    <p>Description: {{ $pokemon->description }}</p>

                    <form method="POST" action="/cart">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value={{ $pokemon->id }}>
                        <input type="hidden" name="priceeach" value={{ $pokemon->priceeach }}>
                        <input type="hidden" name="name" value={{ $pokemon->name }}>
                        <input type="hidden" name="stock" value={{ $pokemon->stock }}>

                        @if ($pokemon->stock > 0)
                            Quantity: <br>
                            <input type="text" name="quantity">
                            <br>
                            <button type="submit">Add to Cart</button>
                        @endif
                    </form>

                    <br>
                    @if (Auth::user()->admin == true)
                        <a href="/store/{{ $pokemon->id }}/edit"><p>Edit Pokemon</p></a>
                    @endif

				    <a href="/store"><p>Back to store</p></a>
				</div>

        </div>
    </div>
</div>
    
@stop