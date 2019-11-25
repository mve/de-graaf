<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
        $user = User::with('reservations.tables')->find($usercur->id);

        return view('account', compact('user'));
    }

    public function deleteReservation($id)
    {
        $mytimeh = Carbon::now()->format('H:i:s');
        $mytime = Carbon::now()->format('Y-m-d');

        $time = Carbon::parse($mytimeh)->addHour();
        dd($time);
        $reservation = Reservation::with('receipt', 'tables')->find($id);
//        dd($mytimeh, $mytime, $reservation->date ,$reservation->time);
        dd($mytime);
        if ($reservation->date == $mytime ){
            return redirect('/account');
        }

        $reservation->tables()->update(['reservation_id' => null]);
        $reservation->delete();
        return redirect('/account');

    }
    public function update(User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',

        ]);

        $user->name = request('name');
        $user->email = request('email');
        if (request('password') != '') {
            $user->password = bcrypt(request('password'));
        }
        $user->save();
        return back();
    }
}
