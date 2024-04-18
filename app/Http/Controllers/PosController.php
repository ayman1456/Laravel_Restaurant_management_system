<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\Table;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class PosController extends Controller
{

    function pos()
    {
        $food = Food::with('categories:title')->latest()->get();
        $carts = Cart::with('food')->where('user_id', auth()->user()->id)->get();
        $totalQty = $carts->sum('qty');

        $tables = Table::get();
        $categories = Category::select('id', 'title')->get();
        return view('backend.pos', compact('food', 'categories', 'carts', 'tables', 'totalQty'));
    }

    function storeFood(Request $request)
    {
        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->food_id = $request->food;
        $cart->qty = $request->quantity;
        $cart->save();
        return back();
    }

    function confirmOrder(Request $req)
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        dd($carts);

        $order = new Order();
        $order->table_id = $req->table;
        $order->total_price = $req->total_price;
        $order->qty = $req->qty;
        $order->payment = $req->payment ?? 'Cash';
        $order->save();


        if ($order) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cart->food_id;
        }
    }
}
