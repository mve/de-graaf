<?php

namespace App\Http\Controllers;

use App\Receipt;
use App\Table;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Reservation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PhpParser\Node\Expr\New_;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Get all the reservations
    public function adminGet()
    {
        // Haal alle reserveringen op en voeg pagination toe.
        $reservations = Reservation::orderBy('date', 'desc')->paginate(6);
        return view('admin.reservations', compact('reservations'));
    }

    // Get the reservations of day
    public function adminGetDay()
    {
        //Haal vandaag op en voer een query uit waarbij dag vandaag is.
        $today = Carbon::now()->format('Y-m-d');
        $reservations = Reservation::where('date', $today)->orderBy('date', 'desc')->paginate(6);

        return view('admin.reservations', compact('reservations'));
    }

    // Get the reservations of week
    public function adminGetWeek()
    {

        $today = Carbon::now()->format('Y-m-d');
        $nextweek = Carbon::parse($today)->addWeek();
        $reservations = Reservation::whereBetween('date', [$today, $nextweek])->orderBy('date', 'desc')->paginate(6);

        return view('admin.reservations', compact('reservations'));
    }

    // Get the reservations of month
    public function adminGetMonth()
    {
        $today = Carbon::now()->format('Y-m-d');

        $nextMonth = Carbon::parse($today)->addMonth();

        $reservations = Reservation::whereBetween('date', [$today, $nextMonth])->orderBy('date', 'desc')->paginate(6);


        return view('admin.reservations', compact('reservations'));
    }


    public function createReservation(Request $request)
    {
        // get the user that is logedin
        $user  = Auth::user();
        $table = Table::find($request['checkedTable']);

        $reservation = Reservation::create([
            'user_id' => $user->id,
            'people' => $request['people'],
            'date' => $request['date'],
            'time' => $request['selectorTime'],
            'comment' => $request['comment'],
            'reservation_typ' => $request['selectorType']

        ]);
        // create a receipt when a reservation is created
        $receipt = Receipt::create([
            'reservation_id' => $reservation->id
        ]);
//        $reservation->tables()->attach($table->id);
        // attach the tables on a reservation
        foreach ($table as $t) {
            $reservation->tables()->attach($t->id);
        }

        return redirect('/account');
    }

    public function edit(Reservation $reservation)
    {

    }
    //create a reservation as admin
    public function adminCreate(Request $request)
    {
        /*todo when a user is selected*/
//        $user = $request['userid'];

        $table = Table::find($request['checkedTable']);

        /*todo if admin selected a user set userid else make reservation without userid*/
        $reservation = Reservation::create([
//            'user_id' => $user->id,
            'people' => $request['people'],
            'date' => $request['date'],
            'time' => $request['selectorTime'],
            'comment' => $request['comment'],
            'reservation_typ' => $request['selectorType']

        ]);

        $receipt = Receipt::create([
            'reservation_id' => $reservation->id
        ]);

//        $reservation->tables()->attach($table->id);

        foreach ($table as $t) {
            $reservation->tables()->attach($t->id);
        }

        return view('reservations', compact('user'));
    }

    public function adminEdit(Reservation $reservation)
    {
        return view('reservation.adminEdit', compact('reservation'));
    }

    /*todo in the future possibility to update a reservation*/
    public function adminUpdate(Request $request, Reservation $reservation)
    {

        $this->validate(request(), [
            'people' => ['sometimes', 'string', 'max:191'],
            'date' => ['sometimes', 'string', 'max:191'],
            'time' => ['sometimes', 'string', 'max:191'],
            'comment' => ['sometimes', 'nullable', 'string', 'max:191'],
            'reservation_typ' => ['sometimes', 'string', 'max:191'],
        ]);

        $reservation->people = (isset($request->people) > 0) ? $request->people : $reservation->people;
        $reservation->date = (isset($request->date) > 0) ? $request->date : $reservation->date;
        $reservation->time = (isset($request->time) > 0) ? $request->time : $reservation->time;
        $reservation->comment = (isset($request->comment) > 0) ? $request->comment : $reservation->comment;
        $reservation->reservation_typ = (isset($request->reservation_typ) > 0) ? $request->reservation_typ : $reservation->reservation_typ;
        /* TODO gereserveerde tafels bewerken bij een reservering*/
        $reservation->save();

        return back();
    }
    // delete a reservation
    public function adminDelete($id)
    {
        $reservation = Reservation::with('receipt', 'tables')->find($id);

        $reservation->receipt()->update(['reservation_id' => null]);

        $reservation->tables()->update(['reservation_id' => null]);

        $reservation->delete();

        return back();
    }

}
