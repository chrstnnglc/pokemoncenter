<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index()
    {
        return view('profile.index');
    }

    public function cart()
    {
        return view('cart');
    }

    public function view()
    {
       return view('profile.orderhistory');
    }

    public function edit()
    {
       return view('profile.edit');
    }
}
