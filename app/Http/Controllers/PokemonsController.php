<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PokemonsController extends Controller
{
    // protected $table = 'pokemons';
    protected $fillable = [
        'description', 'priceeach', 'stock'
    ];

    public function index() {
    	$pokemons = Pokemon::all();

    	return view('store.index', compact('pokemons'));
    }

    public function show(Pokemon $pokemon) {
    	return view('store.show', compact('pokemon'));
    }

    // public function edit(Pokemon $pokemon) { // correct
    // 	return view('edit', compact('pokemon'));
    // }

    public function add(Request $request) {

        $pokemon = new Pokemon;

    	$pokemon->id = $request->id;
        $pokemon->name = $request->name;
        $pokemon->type = $request->type;
        $pokemon->description = $request->description;
        $pokemon->priceeach = $request->priceeach;
        $pokemon->stock = $request->stock;

        $pokemon->save();

        return back();
    }

    public function update(Request $request, Pokemon $pokemon) { // correct

        $pokemon->description = $request->description !== '' ? $pokemon->description : $pokemon->description;
        $pokemon->priceeach = $request->priceeach !== '' ? $pokemon->priceeach : $pokemon->priceeach;
        $pokemon->stock = $request->stock !== '' ? $pokemon->stock : $pokemon->stock;

        $pokemon->save();

        return back();
    }
}
