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

    public function createReservation(array $data){
        var_dump($data->all());
        $user = Auth::user();
        $user->id;
        $table=Table::find($data['checkedTable']);
        dd($table);

        return Reservation::create([
            'user_id' => $user,
            'people' => $data['people'],
            'date' => $data['date'],
            'time' => $data['selectorTime'],
            'comment' => $data['comment'],
            'reservation_typ' => $data['selectorType']
        ]);
    }
}
