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

    public function getTablesCapacity(Request $request)
    {
        $people = $request['people'];
        // if selected people <=4 show tables that have capacity < 5
        if ($people <= 4) {
            $tables = Table::where('max_capacity', '<=', 4)->get();

        }
        if ($people >= 5) {
            $tables = Table::where('max_capacity', '>=', 4)->get();

        }

        return json_encode($tables);
    }

    public function getTablesById(Request $request)
    {
        $table_ids = $request['table_id'];

        $tables = Table::find($table_ids);

        return $tables;
    }

    public function getReservedTable(Request $request)
    {
        $date = $request['date'];
        $time = $request['time'];

        $newTime          = explode(":", $time);
        $timeBefore       = $newTime[0] - 2;
        $timeAfter        = $newTime[0] + 2;
        $timeMinBefore    = $newTime[1] + 1;
        $timeMinAfter     = $newTime[1] - 1;
        $timeBefore       = $timeBefore . ":" . $timeMinBefore . ":" . $newTime[2];
        $timeAfter        = $timeAfter . ":" . $timeMinAfter . ":" . $newTime[2];
        $timeBeforeformat = $timeBefore;
        $timeAfterformat  = $timeAfter;

        $reservations = Reservation::with('tables')
                                   ->where('date', '=', $date)
                                   ->whereBetween('time', [$timeBeforeformat, $timeAfterformat])
                                   ->get();

//        $reservation = $reservations > tables->pluck('tables')->flatten();
//        foreach ($reservations as $res) {
//            return $res->tables->pluck('tables')->flatten();
//
//            foreach ($res->tables as $table) {
//                return $table;
//                array_push($tablearray, $table->id);
//            }
//        }
//        foreach ($reservations as $r) {
//            foreach ($r->tables() as $tabel) {
//                array_push($tablearray, $tabel->id);
//            }
//        }
//        $reservation[] = $reservations;

        return json_encode($reservations);
//        return $table;
    }
}
