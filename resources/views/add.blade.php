@extends('layouts.app')

@section('title')
    <title>Add a Pokémon | Pokémon Center</title>
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
					<h3>Add a Pokémon</h3>

					<form method="POST" action="/store">
						{{ csrf_field() }}

						<div>
							Pokédex number: <br><input type="text" name="id"><br><br>
							Name: <br><input type="text" name="name"><br><br>
							Type: <br><input type="text" name="type"><br><br>
							Description: <br><textarea name="description"></textarea><br><br>
							Price per item: <br><input type="text" name="priceeach"><br><br>
							Stock: <br><input type="text" name="stock"><br><br>
						</div>

						<button type="submit">Add</button>

					</form>
				</div>
		</div>
	</div>
</div>
@stop