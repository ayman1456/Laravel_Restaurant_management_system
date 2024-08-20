<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    protected $redirectTo = '/my-profile';



    public function showLoginForm()
    {
        return view('frontend.Auth.Login');
    }



    protected function guard()
    {
        return Auth::guard('customer');
    }


    
}
