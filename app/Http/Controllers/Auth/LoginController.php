<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username(): string
    {
        return 'nickname';
    }

    protected function attemptLogin(Request $request)
    {
        $username = $request->input('nickname');
        $password = $request->input('password');

        if (Auth::attempt(['nickname' => $username, 'password' => $password])) {
            return true;
        }

        if (Auth::attempt(['email' => $username, 'password' => $password])) {
            return true;
        }

        return false;
    }

}
