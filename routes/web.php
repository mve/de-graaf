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
Route::get('/reserveringen', 'ReservationController@userGet')->name('home')->middleware('auth');

Route::get('/account',   'HomeController@edit')->middleware('auth');

Route::get('/account/{user}',   ['as' => 'account.edit', 'uses' => 'HomeController@edit'])->middleware('auth');
Route::patch('/account/{user}', 'HomeController@update')->middleware('auth');
    Route::get('/reservering',   'TableController@getTables')->middleware('auth');



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
