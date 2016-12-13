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
				    Name: {{ $user->name }}<br>
                    Email: {{ $user->email }}
				    <br> 
                    <a href="{{ url('/profile/orderhistory') }}">View order history</a>

                    <form method="POST" action="/profile">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div>
                            Name: <br><input type="text" name="name"><br><br>
                            Email: <br><input type="text" name="email"><br><br>
                        </div>

                        <button type="submit">Update</button>

                    </form>
                </div>
        </div>
    </div>
</div>
@stop