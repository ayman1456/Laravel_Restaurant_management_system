<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function show()
    {
        return view('frontend.Profile');
    }
    function settings()
    {
        return view('frontend.ProfileSetting');
    }

    function updateprofile(Request $request)
    {
        $fileName = null;

        if ($request->hasFile('profile')) {

            $fileName = $request->profile->store('users', 'public');
        }
        // dd($request->all());
        Customer::where('id', auth('customer')->id())->update([
            'name' => $request->name,
            'address' => $request->address ?? auth('customer')->user()->address,
            'profile_url' => $fileName ?? auth('customer')->user()->profile_img,
        ]);


        return back();
    }

    function orders(Request $request)
    {
        $query = Order::query();
        if ($request->from) {
            $query->where('created_at', '>=', $request->from);
        }
        if ($request->to) {
            $query->where('created_at', '<=', $request->to);
        }
        $orders = $query->with('table')->where('customer_id', auth('customer')->id())->get();

        return view('frontend.Order', compact('orders'));
    }
}
