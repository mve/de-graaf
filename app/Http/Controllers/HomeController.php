<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function Validator(array $data)
    {
        return Validator::make($data, [
            'g-recaptcha-response' => 'required|recaptcha',
            'name'                 => 'required',
            'email'                => 'required',
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();

        return view('home', compact('users'));
    }

    public function edit(User $user)
    {
        $usercur = Auth::user();
        $user    = User::with('reservations.tables')->find($usercur->id);
        $time = Carbon::now()->format('Y-m-d');
        $hourNow = Carbon::now()->format('H:i:s');
        $hour = Carbon::parse($hourNow)->addHours(3);
        $hour= $hour->format('H:i:s');
        return view('account', compact('user', 'time', 'hour'));
    }

    public function deleteReservation($id)
    {
        $mytimeh = Carbon::now()->format('H:i:s');
        $mytime  = Carbon::now()->format('Y-m-d');

        $time = Carbon::parse($mytimeh)->addHours(3);


        $reservation = Reservation::with('receipt', 'tables')->find($id);
        if ($reservation->date <= $mytime) {
            if ($time->format('H:i:s') > $reservation->time) {

                return Redirect::back()->withErrors(['Je mag niet meer annuleren']);
            }
        }

        $reservation->receipt()->update(['reservation_id' => null]);

        $reservation->tables()->update(['reservation_id' => null]);
        $reservation->delete();

        return redirect('/account');

    }

    public function update(User $user)
    {
        $this->validate(request(), [
            'name'  => 'required',
            'email' => 'required',

        ]);

        $user->name  = request('name');
        $user->email = request('email');
        if (request('password') != '') {
            $user->password = bcrypt(request('password'));
        }
        $user->save();

        return back();
    }

    public function deleteaccount()
    {
        return view('deleteaccount');
    }

    public function deleteconfirm(Request $request)
    {
        $validatedData = $request->validate([
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        $usercur = Auth::user();
        $user    = User::with('reservations.tables')->find($usercur->id);
        $user->reservations()->update(['user_id' => null]);

        $user->delete();

        return redirect('/login')->withErrors(['Je account is succesvol verwijderd']);

    }
}
