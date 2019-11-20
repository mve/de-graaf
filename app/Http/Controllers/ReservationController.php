<?php

namespace App\Http\Controllers;
use App\Table;
use Illuminate\Support\Facades\Auth;

use App\Reservation;
use App\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function adminGet()
    {
        $unsortedreservations = Reservation::with('tables')->where('people', '>', 0);
        $sorted = $unsortedreservations->orderBy('date','asc');
        $reservations = $sorted->paginate(6);

        return view('admin.reservations', compact('reservations'));
    }


    public function userGet()
    {
        $usercur = Auth::user();
        $user = User::with('reservations.tables')->find($usercur->id);



        return view('reservations', compact('user'));

    }

    public function createReservation(Request $request){

        $user = Auth::user();
        $table=Table::find($request['checkedTable']);

        $reservation = Reservation::create([
            'user_id' => $user->id,
            'people' => $request['people'],
            'date' => $request['date'],
            'time' => $request['selectorTime'].':00:00',
            'comment' => $request['comment'],
            'reservation_typ' => $request['selectorType']

        ]);

//        $reservation->tables()->attach($table->id);

        foreach($table as $t){
            $reservation->tables()->attach($t->id);
        }
    }
}
