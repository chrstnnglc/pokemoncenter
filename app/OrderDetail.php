<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function orders() {
		return $this->belongsTo(Order::class);
	}

	public function pokemons() {
        return $this->hasOne(Pokemon::class);
    }
}
