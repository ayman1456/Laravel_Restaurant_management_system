<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Helpers\GetDistricts;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    use GetDistricts;
    function checkout()
    {

        $districts = $this->getDis()['districts'];
        $settings = Setting::select('id', 'delivery')->first();
        
        $carts = Cart::where('customer_id', auth('customer')->id())->get() ?? [];
        return view('frontend.checkout', compact('carts', 'districts', 'settings'));
    }
}
