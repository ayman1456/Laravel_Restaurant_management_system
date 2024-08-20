<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';
    function redirectTo()
    {
        if (auth()->user()->getRoleNames()->first() == 'admin') {
            return "/dashboard";
        } else if (auth()->user()->getRoleNames()->first() == 'pos-manager') {
            return "/pos";
        } else {
            return "/kitchen-order";
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }


    function employeeApprovalList()
    {
        // $approvalLists = Customer::with('roles')->get();
        $approvalLists = Customer::whereHas('roles', function ($query) {
            $query->where('status', false);
        })->with('roles')->get();


        return view('backend.EmployeeApproval', compact('approvalLists'));
    }

    function employeeApproval($status, $id)
    {

        if ($status == 1) {
            DB::table('model_has_roles')
                ->where('model_type', 'App\Models\Customer')
                ->where('model_id', $id)
                ->update(['status' => true]);
        } else {
            DB::table('model_has_roles')
                ->where('model_type', 'App\Models\Customer')
                ->where('model_id', $id)
                ->delete();
        }
    }
}
