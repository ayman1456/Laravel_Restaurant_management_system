<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    function show()
    {
        return view('frontend.Profile');
    }
    function settings()
    {
        // dd(auth('customer')->user()->roles->where('status',true)->first()?->name);
        return view('frontend.ProfileSetting');
    }

    function updateprofile(Request $request)
    {
        $fileName = null;

        if ($request->hasFile('profile')) {

            $fileName = $request->profile->store('users', 'public');
        }
        // dd($request->all());
        $user = Customer::where('id', auth('customer')->id())->first();
        $user->name = $request->name;
        $user->address = $request->address ?? auth('customer')->user()->address;
        $user->profile_url = $fileName ?? auth('customer')->user()->profile_img;
        $user->save();



        if ($request->type) {

            if (auth('customer')->user()->roles->where('status', false)->first()?->name) {
                Session::flash('msg', 'Please wait for approval!');
            }


            if ($request->type == 'delivery') {
                $user->syncRoles([$request->type]);
            } else {
                $user->removeRole('delivery');
            }
        }


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

    function deliveries(Request $request)
    {
        $query = Order::query();
        if ($request->from) {
            $query->where('created_at', '>=', $request->from);
        }
        if ($request->to) {
            $query->where('created_at', '<=', $request->to);
        }
        $orders = $query->with('table')->whereIn('status', ['Processing', 'Delivering'])->get();

        return view('frontend.myDeliveries', compact('orders'));
    }

    function setDelivery($id)
    {
        $order = Order::find($id)->update([
            'status' => 'Delivering',
        ]);
        return back();
    }

    function markOrder($id)
    {
        $order = Order::find($id)->update([
            'status' => 'Complete',
        ]);
        return back();
    }
}
