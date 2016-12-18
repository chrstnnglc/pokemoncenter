@extends('layouts.app')

@section('title')
    <title>Profile | Pokémon Center</title>
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
                    <form method="POST" action="/profile">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div>
                            Name: <br><input type="text" name="name" value = {{ $user->name }}><br><br>
                            Email: <br><input type="text" name="email" value = {{ $user->email }}><br><br>
                        </div>

                        <button type="submit">Update</button>

                    </form>

                    <a href="{{ url('/profile/orderhistory') }}">View order history</a>
                </div>
        </div>
    </div>
</div>
@stop