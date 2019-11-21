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
Auth::routes(['verify' => true]);


//Route::get('/', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('home');
})->middleware('notBlocked');

Route::get('/contact', function () {
    return view('contact');
})->middleware('notBlocked');

Route::post('/contact',  'UserController@sendmail');

    Route::get('/menu', function () {
    return view('menu');
})->middleware('notBlocked');


// User routes
Route::get('/reserveringen',
    'ReservationController@userGet')->name('home')->middleware('verified')->middleware('notBlocked');

Route::get('/account', 'HomeController@edit')->middleware('verified');

Route::get('/account/{user}',
    ['as' => 'users.edit', 'uses' => 'UserController@edit'])->middleware('verified')->middleware('notBlocked');
Route::patch('/account/{user}',
    ['as' => 'users.update', 'uses' => 'UserController@update'])->middleware('verified')->middleware('notBlocked');

Route::get('/reservering', function () {
    return view('reservation');
})->middleware('verified')->middleware('notBlocked');

Route::post('/reservering',
    'ReservationController@createReservation')->middleware('verified')->middleware('notBlocked');

Route::get('/get-tables', 'TableController@getTables')->middleware('verified')->middleware('notBlocked');

Route::get('/blocked', function () {
    return view('blocked');
});

// Admin routes
Route::get('/beheer', function () {
    return view('admin.home');
})->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/bestellingen', function () {
    return view('admin.orders');
})->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/createOrder',
    'OrderController@adminGet')->name('home')->middleware('admin')->middleware('notBlocked');

Route::get('/beheer/reserveringen',
    'ReservationController@adminGet')->name('home')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/gebruikers',
    'UserController@index')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::patch('/beheer/gebruikers', 'UserController@index')->middleware('admin')->middleware('verified');

Route::get('/beheer/gebruikers/{user}',
    ['as' => 'users.adminEdit', 'uses' => 'UserController@adminEdit'])->middleware('verified');

Route::patch('/beheer/gebruikers/{user}',
    ['as' => 'users.adminUpdate', 'uses' => 'UserController@adminUpdate'])->middleware('verified');


Route::post('/get-reserved', 'TableController@getReservedTable');
