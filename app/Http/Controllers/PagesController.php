<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function home() {
    	$links = ['Store', 'Login'];

    	return view('home', compact('links'));
    }

    public function tester() {
    	return view('tester');
    }
}
