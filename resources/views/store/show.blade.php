@extends('layouts.app')

@section('title')
    <title>Pokemon Center</title>
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
				    <h3>Php {{ $pokemon->priceeach }}</h3>

				    <h4>Type: {{ $pokemon->type }}</h4>
				    <p>Description: {{ $pokemon->description }}</p>
					<a href="edit"><p>Edit information</p></a>
				    <a href="{{ url('/store') }}"><p>Back to store</p></a>
				</div>

        </div>
    </div>
</div>
    
@stop