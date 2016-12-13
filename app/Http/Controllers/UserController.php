<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function index()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function view()
    {
       return view('profile.orderhistory');
    }

    public function update(Request $request) { // correct
        $user = Auth::user();

        $user->name = $request->name !== '' ? $user->name : $user->name;
        $user->email = $request->email !== '' ? $user->email : $user->email;

        #$this->attributes['description'] = trim($description) !== '' ? $description : null;

        $user->save();

        return back();
    }
}
