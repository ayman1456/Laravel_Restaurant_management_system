<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;


class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/my-profile';



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => 'required|unique:customers,phone'
        ]);
    }

    public function showRegistrationForm()
    {

        return view('frontend.Auth.Register');
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }


    protected function create(array $data)
    {

        $user =   Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        new Registered($user = $this->create($request->all()));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }
}
