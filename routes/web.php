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
})->middleware('notBlocked');

Route::get('/menu', function () {
    return view('menu');
})->middleware('notBlocked');


// User routes
Route::get('/reserveringen',
    'ReservationController@userGet')->name('home')->middleware('auth')->middleware('notBlocked');

Route::get('/account', 'HomeController@edit')->middleware('auth');

Route::get('/account/{user}',
    ['as' => 'users.edit', 'uses' => 'UserController@edit'])->middleware('auth')->middleware('notBlocked');
Route::patch('/account/{user}', ['as' => 'users.update', 'uses' => 'UserController@update'])->middleware('auth')->middleware('notBlocked');

Route::get('/reservering', function () {
    return view('reservation');
})->middleware('auth')->middleware('notBlocked');

Route::post('/reservering',   'ReservationController@createReservation')->middleware('auth')->middleware('notBlocked');

Route::get('/get-tables',   'TableController@getTables')->middleware('auth')->middleware('notBlocked');

Route::get('/blocked', function () {
    return view('blocked');
});

// Admin routes
Route::get('/beheer', function () {
    return view('admin.home');
})->middleware('admin')->middleware('notBlocked');

Route::get('/beheer/bestellingen', function () {
    return view('admin.orders');
})->middleware('admin')->middleware('notBlocked');

Route::get('/beheer/reserveringen',
    'ReservationController@adminGet')->name('home')->middleware('admin')->middleware('notBlocked');

Route::get('/beheer/gebruikers', 'UserController@index')->middleware('admin')->middleware('notBlocked');

Route::patch('/beheer/gebruikers', 'UserController@index')->middleware('admin');

Route::get('/beheer/gebruikers/{user}', ['as' => 'users.adminEdit', 'uses' => 'UserController@adminEdit']);

Route::patch('/beheer/gebruikers/{user}', ['as' => 'users.adminUpdate', 'uses' => 'UserController@adminUpdate']);


Route::post('/get-reserved',   'TableController@getReservedTable');
