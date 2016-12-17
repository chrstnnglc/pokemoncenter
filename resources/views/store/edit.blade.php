@extends('layouts.app')

@section('title')
    <title>Edit Pokémon | Pokémon Center</title>
@stop

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1>Store</h1>
				</div>

				<div class="panel-body">				
					<h3>Edit Pokémon</h3>

                    <form method="POST" action="/store/{{ $pokemon->id }}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div>
                            Description: <br><textarea name="description">{{ $pokemon->description }}</textarea><br><br>
                            Price per item: <br><input type="text" name="priceeach"><br><br>
                            Stock: <br><input type="text" name="stock"><br><br>
                        </div>

                        <button type="submit">Update</button>

                    </form>
				</div>
		</div>
	</div>
</div>
@stop