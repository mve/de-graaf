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
    // Get all the tables
    public function getTables()
    {
        $tables = Table::all();
        return json_encode($tables);
    }
    // Get specific tables whit the capacity above 4 of under 4 capacity
    /* Tables with a capacity of 2 and 4 are visible for  */
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

    // get reserved table by date and time
    public function getReservedTable(Request $request)
    {
        $date = $request['date'];
        $time = $request['time'];

        /* split the time like
         $newtime[0] hour
         $newtime[1] min
         $newtime[2] sec */
        $newTime          = explode(":", $time);

        // subtract 2 hours of the time
        $timeBefore       = $newTime[0] - 2;
        // add 2 hours to the time
        $timeAfter        = $newTime[0] + 2;
        // add 1 min to the time
        $timeMinBefore    = $newTime[1] + 1;
        // subtract 1 min of the time
        $timeMinAfter     = $newTime[1] - 1;

        // put the split times together
        $timeBefore       = $timeBefore . ":" . $timeMinBefore . ":" . $newTime[2];
        $timeAfter        = $timeAfter . ":" . $timeMinAfter . ":" . $newTime[2];
        $timeBeforeformat = $timeBefore;
        $timeAfterformat  = $timeAfter;
        // check which have date and between the time
        $reservations = Reservation::with('tables')
                                   ->where('date', '=', $date)
                                   ->whereBetween('time', [$timeBeforeformat, $timeAfterformat])
                                   ->get();

        return json_encode($reservations);
//        return $table;
    }
}
