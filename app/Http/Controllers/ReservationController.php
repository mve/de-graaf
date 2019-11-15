<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function adminGet()
    {
        $reservations = Reservation::all();
        return view('admin.reservations', compact('reservations'));
    }
}
