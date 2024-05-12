<?php

namespace App\Http\Controllers\Backend;

use App\Models\Food;
use App\Models\User;
use App\Models\Order;
use App\Models\Table;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    function home()
    {
        $revenew = Order::where('status', 'Complete')->orWhere('status', 'Processing')->sum('total_price');
        $categories = Category::count();
        $tables = Table::count();
        $food = Food::count();
        $employees = User::count();
        return view('backend.dashboard', compact('revenew', 'categories', 'tables', 'food', 'employees'));
    }
}
