<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function hasTooManyLoginAttempts(Request $request)
    {
        $this->limiter()->hit($this->throttleKey($request));


        if ($this->limiter()->attempts($this->throttleKey($request)) == 3){
            $user= User::where('email', $request->email)->first();
            $user->active = 0;
            $user->update();
        }
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), 5 // <--- Change this
        );
    }
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
    protected $redirectTo = '/';

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
