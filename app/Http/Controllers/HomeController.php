<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        return view('account', compact('user'));
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
}
