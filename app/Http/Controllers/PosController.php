<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\Table;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PosController extends Controller
{

    function pos()
    {
        $food = Food::with('categories:title')->latest()->get();
        $carts = Cart::with('food')->where('user_id', auth()->user()->id)->latest()->get();
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
        $carts = Cart::with('food:id,price')->where('user_id', auth()->user()->id)->get();


        $order = new Order();
        $order->table_id = $req->table;
        $order->total_price = $req->total_price;
        $order->qty = $req->qty;
        $order->payment = $req->payment ?? 'Cash';
        $order->save();

        $orderItems = [];
        if ($order) {
            foreach ($carts as $cart) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->food_id = $cart->food_id;
                $orderItem->qty = $cart->qty;
                $orderItem->price = $cart->qty * $cart->food->price;
                $orderItem->save();
                $orderItems[] = $orderItem;
                $cart->delete();
            }
        }
        return redirect()->route('invoice.view', $order);
        // return view('backend.Invoice', );
    }

    function invoiceView($order)
    {
        $order = Order::with('orderItems.food:id,title')->find($order);
        // dd($order);
        return view('backend.Invoice', compact('order'));
    }

    function invoiceOrder($order)
    {
        $order = Order::with('orderItems.food:id,title')->find($order);
        // dd($order->toArray());
        $pdf = Pdf::loadView('layouts.utils.invoice', ['order' => $order->toArray()]);
        return $pdf->download('invoice.pdf');
    }

    function removeFood($id)
    {
        Cart::findOrFail($id)->delete();
        return back();
    }
}
