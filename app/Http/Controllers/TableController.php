<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getTables()
    {
        $tables = Table::all();

        return json_encode($tables);
    }

    public function getSingleTable()
    {

    }

    public function getReservedTable(Request $request)
    {
        $date       = $request['date'];
        $time       = $request['time'];
        $timeBefore = $time - 1;
        $timeAfter  = $time + 1;

        $timeBeforeformat = $timeBefore . ':00:00';
        $timeAfterformat  = $timeAfter . ':00:00';

        $reservations = Reservation::with('tables')
                                   ->where('date', '=', $date)
                                   ->whereBetween('time', [$timeBeforeformat, $timeAfterformat])
                                   ->get();
//        $reservation = $reservations>tables->pluck('tables')->flatten();
//        foreach($reservations as $res){
//            return $res->tables->pluck('tables')->flatten();
//
////            foreach ($res->tables as $table){
//////                return $table;
//////                array_push($tablearray,$table->id);
////            }
//        }
//        foreach ($reservations as $r){
////            foreach ($r->tables() as $tabel){
////                array_push($tablearray,$tabel->id);
////            }
////        }
////        $reservation[] = $reservations;

        return json_encode($reservations);
//        return $table;
    }
}
