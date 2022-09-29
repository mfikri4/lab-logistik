<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

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

    
    //protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo() {
        switch(Auth()->user()->level) {
            case 1:
                return '/home';
            case 2:
                return '/admin';            
            case 3:
                return '/user';            
            case 4:
                return '/user-riset';         
            case 5:
                return '/user-kultur';
            default:
                return '/login';
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
