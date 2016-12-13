<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/* HOMEPAGE */
Route::get('/', 'HomeController@index');

Route::get('tester', 'PagesController@tester');

Route::get('store', 'PokemonsController@index');
Route::get('store/{pokemon}', 'PokemonsController@show');
Route::get('store/order', 'PokemonsController@order');
Route::post('store', 'PokemonsController@add');

// Route::get('add', 'PokemonsController@add');
// Route::get('edit', 'PokemonsController@edit');

Route::get('profile', 'UserController@index');
Route::get('profile/edit', 'UserController@edit'); //
Route::get('profile/orderhistory', 'UserController@view'); //
Route::get('profile/edit', 'UserController@edit'); //
Route::get('cart', 'UserController@cart'); //

Auth::routes();

// get('protected', ['middleware' => ['auth', 'admin'], function() {
//     return "this page requires that you be logged in and an Admin";
// }]);

// Route::get('pokemons/add', 'PokemonsController@add'); // form for adding a pokemon
// Route::post('pokemons', 'PokemonsController@store'); // where the submission will go 
// Route::post('pokemons/{pokemon}', 'PokemonsController@show'); // show card (without edit) and edit card (with edit)
// Route::post('pokemons/{pokemon}/edit', 'PokemonsController@edit');
// Route::delete