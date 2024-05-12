<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $foods = Food::take(12)->latest()->get();
        $banners = $foods->where('featured',true);
        // dd($banners);
        return view('frontend.Homapage', compact('banners', 'foods'));
    }
}
