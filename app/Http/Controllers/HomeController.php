<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            'name' => 'required',
            'email' => 'required',
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
        // Huidige gebruiker ophalen
        $user = Auth::user();

        //Huidige dag in formaat
        $date = Carbon::now()->format('Y-m-d');
        // Tijd plus 3 uur zodat je niet binnen 3 uur kan annuleren
        $timeNow = Carbon::now()->addHours(3);
        //Formateren van tijd
        $time = $timeNow->format('H:i:s');
        return view('account', compact('user', 'date', 'time'));
    }

    public function deleteReservation($id)
    {
        // huidige tijd in 2 formaten
        $hourNow = Carbon::now()->format('H:i:s');
        $dateNow = Carbon::now()->format('Y-m-d');

        //Huidige tijd + 3 uur
        $time = Carbon::parse($hourNow)->addHours(3);
        //reservering met nota en tafels ophalen
        $reservation = Reservation::with('receipt', 'tables')->find($id);

/**
            Kijkt eerst of de reserveringsdatum kleiner of gelijk is aan de huidige datum
            Kijkt daarna of huidige tijd + 3 uur groter is dan de reserverings tijd
            Als dit zo is stuurt hij je terug met een error
 */
        if ($reservation->date <= $dateNow) {
            if ($time->format('H:i:s') > $reservation->time) {
                return Redirect::back()->withErrors(['Je mag niet meer annuleren']);
            }
        }

        // Ontkoppelt Nota en tafels van de desbetreffende reservering en verwijderd vervolgens de reservering.
        $reservation->receipt()->update(['reservation_id' => null]);

        $reservation->tables()->update(['reservation_id' => null]);

        $reservation->delete();

        return redirect()->back()->with('success', 'Je reservering is succesvol geannuleerd!');

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

    public function deleteaccount()
    {
        return view('deleteaccount');
    }

    public function deleteconfirm(Request $request)
    {
        // Kijkt of de RECAPTCHA is voltooid
        $validatedData = $request->validate([
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        // Haalt de huidige user op en verwijderd koppeling met reservering om vervolgens de gebruiker te verwijderen.
        $user = Auth::user();
        $user->reservations()->update(['user_id' => null]);
        $user->delete();

        return redirect('/login')->withErrors(['Je account is succesvol verwijderd']);
    }
}
