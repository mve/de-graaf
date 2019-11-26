<?php

namespace App\Http\Controllers;
use App\Table;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Reservation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    public function adminGetDay()
    {
        $today = Carbon::now()->format('Y-m-d');
        $yesterday = Carbon::yesterday()->format('Y-m-d');

        $tomorrow = Carbon::parse($today)->addDay();

        $unsortedreservations = Reservation::with('tables')->whereBetween('date', [$yesterday, $tomorrow]);
        $sorted = $unsortedreservations->orderBy('date','asc');
        $reservations = $sorted->paginate(6);

        return view('admin.reservations', compact('reservations'));
    }
    public function adminGetWeek()
    {
        $today = Carbon::now()->format('Y-m-d');
        $yesterday = Carbon::yesterday()->format('Y-m-d');

        $nextweek = Carbon::parse($today)->addWeek();

        $unsortedreservations = Reservation::with('tables')->whereBetween('date', [$yesterday, $nextweek]);
        $sorted = $unsortedreservations->orderBy('date','asc');
        $reservations = $sorted->paginate(6);

        return view('admin.reservations', compact('reservations'));
    }
    public function adminGetMonth()
    {
        $today = Carbon::now()->format('Y-m-d');
        $yesterday = Carbon::yesterday()->format('Y-m-d');

        $nextMonth = Carbon::parse($today)->addMonth();

        $unsortedreservations = Reservation::with('tables')->whereBetween('date', [$yesterday, $nextMonth]);
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
            'time' => $request['selectorTime'],
            'comment' => $request['comment'],
            'reservation_typ' => $request['selectorType']

        ]);

//        $reservation->tables()->attach($table->id);

        foreach($table as $t){
            $reservation->tables()->attach($t->id);
        }

        return view('reservations', compact('user'));
    }

    public function edit(Reservation $reservation)
    {

    }

    public function adminEdit(Reservation $reservation)
    {
        return view('reservation.adminEdit', compact('reservation'));
    }

    public function adminUpdate(Request $request, Reservation $reservation)
    {

        $this->validate(request(), [
            'people' => ['sometimes', 'string', 'max:191'],
            'date' => ['sometimes', 'string', 'max:191'],
            'time' => ['sometimes', 'string', 'max:191'],
            'comment' => ['sometimes', 'nullable', 'string', 'max:191'],
            'reservation_typ' => ['sometimes', 'string', 'max:191'],

        ]);
        $reservation->people      = (isset($request->people) > 0) ? $request->people : $reservation->people;
        $reservation->date     = (isset($request->date) > 0) ? $request->date : $reservation->date;
        $reservation->time   = (isset($request->time) > 0) ? $request->time : $reservation->time;
        $reservation->comment = (isset($request->comment) > 0) ? $request->comment : $reservation->comment;
        $reservation->reservation_typ   = (isset($request->reservation_typ) > 0) ? $request->reservation_typ : $reservation->reservation_typ;
         /* TODO gereserveerde tafels bewerken bij een reservering*/
        $reservation->save();

        return back();
    }



    public function getDay()
    {
        $usercur = Auth::user();
                $today = Carbon::now()->format('Y-m-d');
        $tomorrow = Carbon::parse($today)->addDay();
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $sorted = Reservation::with('tables')->where('user_id', '=' , $usercur->id);
        $user = User::find($usercur->id);
        $reservations = $sorted->with('tables')->whereBetween('date', [$yesterday, $tomorrow]);

//::with(array('order' => function($query)
//{
//     $query->where('orders.user_id', $customerID);
//     $query->orderBy('orders.created_at', 'DESC');
//}))
//    ->orderBy('date')
//    ->get();
//        $today = Carbon::now()->format('Y-m-d');
//        $yesterday = Carbon::yesterday()->format('Y-m-d');
//
//        $tomorrow = Carbon::parse($today)->addDay();
//
//        $unsortedreservations = Reservation::with('tables')->whereBetween('date', [$yesterday, $tomorrow]);
//        $sorted = $unsortedreservations->orderBy('date','asc');
        $reservations = $sorted->paginate(6);

        return view('reservations', compact('user'));
    }
    public function getWeek()
    {
        $today = Carbon::now()->format('Y-m-d');
        $yesterday = Carbon::yesterday()->format('Y-m-d');

        $nextweek = Carbon::parse($today)->addWeek();

        $unsortedreservations = Reservation::with('tables')->whereBetween('date', [$yesterday, $nextweek]);
        $sorted = $unsortedreservations->orderBy('date','asc');
        $reservations = $sorted->paginate(6);

        return view('admin.reservations', compact('reservations'));
    }
    public function getMonth()
    {
        $today = Carbon::now()->format('Y-m-d');
        $yesterday = Carbon::yesterday()->format('Y-m-d');

        $nextMonth = Carbon::parse($today)->addMonth();

        $unsortedreservations = Reservation::with('tables')->whereBetween('date', [$yesterday, $nextMonth]);
        $sorted = $unsortedreservations->orderBy('date','asc');
        $reservations = $sorted->paginate(6);

        return view('admin.reservations', compact('reservations'));
    }

}
