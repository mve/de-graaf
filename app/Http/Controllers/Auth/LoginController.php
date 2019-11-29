<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public $maxAttempts = 2;

    protected function hasTooManyLoginAttempts(Request $request)
    {
        //als de user te veel inlogpogingen heeft gedaan en als hij bestaat, dan blokkeer de gebruiker.
        if ($this->limiter()->tooManyAttempts($this->throttleKey($request), $this->maxAttempts())) {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user->active = 0;
                $user->update();
            }
            return $this->limiter()->tooManyAttempts($this->throttleKey($request), $this->maxAttempts());

        }
        return $this->limiter()->tooManyAttempts($this->throttleKey($request), $this->maxAttempts()
        );
    }

    protected function incrementLoginAttempts(Request $request)
    {
        //Kijkt of de gebruiker bestaat, als hij bestaat tel 1 poging op, zo niet ga terug naar de pagina zonder iets te doen.
        $user = User::where('email', '=', $request['email'])->first();

        if ($user) {
            $this->limiter()->hit(
                $this->throttleKey($request), $this->decayMinutes() * 60
            );


            throw ValidationException::withMessages([
                $this->username() => [Lang::get('auth.attempts', [
                    'attempt' => $this->limiter()->attempts($this->throttleKey($request)),
                ])],
            ])->status(Response::HTTP_TOO_MANY_REQUESTS);
        }
        return redirect()->back();
    }

    protected function sendLockoutResponse(Request $request)
    {
        return redirect('/blocked');
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
