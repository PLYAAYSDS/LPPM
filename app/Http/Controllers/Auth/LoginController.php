<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\http\Request;
use Auth;
use Redirect;

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
    // protected $redirectTo = '/penelitian';

    protected function authenticated(Request $request, $user)
    {
        //User Role
        $role = $user->role;
        // echo $role;
        // die();
        //Check Role
        if($role == 1){
            return redirect('/penelitianhomelppm');
        } else if($role == 2) {
            return redirect('/penelitianhomedekan');
        } else if($role == 3) {
            return redirect('/penelitianhomekaprodi');
        } else if($role == 4) {
            return redirect('/penelitian');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
