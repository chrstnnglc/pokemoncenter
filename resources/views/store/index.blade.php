@extends('layouts.app')

@section('title')
    <title>Store | Pokémon Center</title>
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
							</tr>
						@endforeach

					</table>

					@if (Auth::user() !== NULL and Auth::user()->admin == true)
						<a href="/add">Add a Pokemon</a>
					@endif

				</div>
		</div>
	</div>
</div>
@stop