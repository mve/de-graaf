<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// public routes
Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('home');
});

Route::get('/menu', function () {
    return view('menu');
});


// User routes
Route::get('/reserveringen', function () {
    return view('reservations');
})->middleware('auth');

Route::get('/account', function () {
    return view('account');
})->middleware('auth');

Route::get('/reservering', function () {
    return view('reservation');
})->middleware('auth');

Route::get('/reserveringen', function () {
    return view('reservations');
})->middleware('auth');

//Route::get('/', 'HomeController@index')->name('home');

// Admin routes
//TODO check of een gebruiker een admin is
Route::get('/beheer', function () {
    return view('admin.home');
})->middleware('admin');

Route::get('/beheer/bestellingen', function () {
    return view('admin.orders');
})->middleware('admin');

Route::get('/beheer/reserveringen', 'ReservationController@adminGet')->name('home')->middleware('admin');


Route::get('/beheer/gebruikers', function () {
    return view('admin.users');
})->middleware('admin');
