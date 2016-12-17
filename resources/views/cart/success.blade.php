@extends('layouts.app')

@section('title')
    <title>Checkout successful! | Pokémon Center</title>
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h1>Checkout successful!</h1>
                </div>

                <div class="panel-body">
                    
                    <h4>Thank you! We look forward to your next purchase!</h4>
                    <a href="/store">Back to store</a>
				</div>
        </div>
    </div>
</div>
@stop