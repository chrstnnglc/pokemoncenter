<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\Order;
use App\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

	public function index()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    public function view()
    {
        $user = Auth::user();
        $orders = Order::where('customerid', $user->id)->where('paidstatus', true);

        if ($orders !== NULL) {
            $orders->orderBy('orderdate', 'desc');
        }

        return view('profile.orderhistory', compact('orders'));
    }

    public function update(Request $request) {
        $user = Auth::user();

        $user->name = $request->name !== '' ? $user->name : $user->name;
        $user->email = $request->email !== '' ? $user->email : $user->email;
        $user->save();

        return back();
    }

    public function cart()
    {
        $user = Auth::user();
        $order = Order::where('customerid', $user->id)->where('paidstatus', false)->first();

        return view('cart.index', compact('order'));
    }

    public function addtocart(Request $request, Pokemon $pokemon) {
        $user = Auth::user();
        $pokemons = Pokemon::all();
        $orders = Order::where('customerid', $user->id);

        if ($request->quantity > $request->stock or $request->stock == 0) {
            // alert

            return back();
        }

        $orderdetail = new OrderDetail;
        $orderdetail->pokemonid = $request->id;
        $orderdetail->pokemonname = $request->name;
        $orderdetail->priceeach = $request->priceeach;
        $orderdetail->quantity = $request->quantity;
        $orderdetail->save();

        if ($orders->count() == 0 or $orders->where('paidstatus', false)->count() == 0) {

            $order = new Order;
            $order->customerid = $user->id;
            $order->paidstatus = false;
            $order->total = 0;
            $order->orderdate = Carbon::now()->toDayDateTimeString();
            $order->save();

            $order->orderdetails()->save($orderdetail);

            $order->total = ($orderdetail->priceeach * $orderdetail->quantity);
            $order->save();
        }
        else {

            $order = $orders->first();

            $order->orderdetails()->save($orderdetail);
            $order->total = $order->total + ($orderdetail->priceeach * $orderdetail->quantity);
            $order->save();
        }
    
        // alert        
        return back();
    }

    public function updatecart(Request $request)
    {
        $user = Auth::user();
        $order = Order::where('customerid', $user->id)->where('paidstatus', false)->first();
        $orderdetail = $order->orderdetails()->where('id', $request->id)->first();

        $order->total = $order->total - ($orderdetail->priceeach * $orderdetail->quantity);

        $orderdetail->quantity = $request->quantity !== 0 ? $orderdetail->quantity : $orderdetail->quantity;
        $orderdetail->save();

        $order->total += ($orderdetail->priceeach * $orderdetail->quantity);
        $order->save();

        return back();
    }

    public function deletefromcart (Request $request) {
        $user = Auth::user();
        $order = Order::where('customerid', $user->id)->where('paidstatus', false)->first();
        $orderdetail = $order->orderdetails()->where('id', $request->id)->first();
        $order->total = $order->total - ($orderdetail->priceeach * $orderdetail->quantity);
        $order->save();
        $orderdetail->delete();

        return back();
    }

    public function checkoutcart(Request $request)
    {
        $user = Auth::user();
        $order = Order::where('customerid', $user->id)->where('id', $request->id)->first();
        $pokemons = Pokemon::all();

        foreach ($order->orderdetails()->get() as $orderdetail) {
            $pokemon = $pokemons->where('id', $orderdetail->pokemonid)->first();
            $pokemon->stock = $pokemon->stock - $orderdetail->quantity;
            $pokemon->save();
        }

        $order->paidstatus = true;
        $order->orderdate = Carbon::now()->toDayDateTimeString();
        $order->save();

        return view('cart.success');
    }
}