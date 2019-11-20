<?php

namespace App\Http\Controllers;

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
        return view('reservation', compact('tables'));
    }

    public function getSingleTable(){

    }
}
