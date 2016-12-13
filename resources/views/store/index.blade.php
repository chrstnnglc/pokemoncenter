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
					<h1>Store</h1>
				</div>

				<div class="panel-body">
					<table>
		
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Type</th>
							<th>Price per item</th>
							<th>Stock</th>
							<th>Order</th>
						</tr>

						@foreach ($pokemons as $pokemon)
							<tr>
								<td>{{ $pokemon->id }}</td>
								<td><a href="/store/{{ $pokemon->id }}">{{ $pokemon->name }}</a></td>
								<td>{{ $pokemon->type }}</td>
								<td>{{ $pokemon->priceeach }}</td>
								@if ($pokemon->stock > 0)
									<td>{{ $pokemon->stock }}</td>
								@else
									<td>Out of stock!</td>
								@endif
								<td><a>Order</a></td>
							</tr>
						@endforeach

					</table>

					<!-- THIS PART ONLY VIEWABLE TO ADMIN -->					

					<h3>Add a Pokemon</h3>

					<form method="POST" action="/store">
						{{ csrf_field() }}

						<div>
							Pokedex number: <br><input type="text" name="id"><br><br>
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