<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Helper\Table;

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
}
