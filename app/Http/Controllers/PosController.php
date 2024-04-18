<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;

class PosController extends Controller
{
    
    function pos()
    {
        $food = Food::with('categories:title')->latest()->get();

        $categories = Category::select('id', 'title')->get();
        return view('backend.pos',compact('food', 'categories'));
    }
}
