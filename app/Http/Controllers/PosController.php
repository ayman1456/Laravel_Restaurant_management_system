<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Category;
use App\Models\Table;
use Illuminate\Http\Request;

class PosController extends Controller
{
    
    function pos()
    {
        $food = Food::with('categories:title')->latest()->get();
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $tables = Table::get();
        $categories = Category::select('id', 'title')->get();
        return view('backend.pos',compact('food', 'categories', 'carts','tables'));
    }

    function storeFood(Request $request) {
        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->food_id = $request->food;
        $cart->qty = $request->quantity;
        $cart->save();
        return back();
        
    }

    
}
