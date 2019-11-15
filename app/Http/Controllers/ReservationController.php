<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function adminGet()
    {
        $unsortedreservations = Reservation::where('people', '>', 0);
        $sorted = $unsortedreservations->orderBy('date','asc');
        $reservations = $sorted->paginate(6);

        return view('admin.reservations', compact('reservations'));
    }
}
