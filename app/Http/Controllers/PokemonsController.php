<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PokemonsController extends Controller
{   
    public function __construct() {
        $this->middleware('admin', ['only' => ['addpokemon', 'updatepokemon']]);
    }

    // protected $table = 'pokemons';
    protected $fillable = [
        'description', 'priceeach', 'stock'
    ];

    public function index() {
    	$pokemons = Pokemon::all()->sortBy('id');

    	return view('store.index', compact('pokemons'));
    }

    public function show(Pokemon $pokemon) {
    	return view('store.show', compact('pokemon'));
    }

    public function addform() {
        return view('add');
    }

    public function editform(Pokemon $pokemon) {
        return view('store.edit', compact('pokemon'));
    }

    public function addpokemon(Request $request) {

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

    public function editpokemon(Request $request, Pokemon $pokemon) {

        $pokemon->description = $request->description;
        $pokemon->priceeach = $request->priceeach;
        $pokemon->stock = $request->stock;

        $pokemon->save();

        return back();
    }
}
