<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    function menu()
    {
        return view('frontend.menu');
    }
}
