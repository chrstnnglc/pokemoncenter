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
                	<h1>Profile</h1>
                </div>

                <div class="panel-body">
				    Show information for user.
				    <br>
				     <a href="{{ url('/profile/edit') }}">Edit.</a> <a href="{{ url('/profile/orderhistory') }}">Order history.</a>
				</div>
        </div>
    </div>
</div>
@stop