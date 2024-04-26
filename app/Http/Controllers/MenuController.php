<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function menu()
    {

        $foods = Food::paginate(20);
        

        return view('frontend.menu', compact('foods'));
    }
}
