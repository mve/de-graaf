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

Route::get('/', function () {
    return view('home');
})->middleware('notBlocked');

Route::get('/contact', function () {
    return view('contact');
})->middleware('notBlocked');

Route::post('/contact', 'UserController@sendmail');

Route::get('/menu',
    'ProductController@index');

// User routes
Route::get('/reserveringen',
    'ReservationController@userGet')->name('home')->middleware('verified')->middleware('notBlocked');

Route::get('/account', 'HomeController@edit')->middleware('verified');

Route::post('/get-reserved', 'TableController@getReservedTable');

Route::get('account/delete/{id}', 'HomeController@deleteReservation')->middleware('verified');

Route::post('account/delete/account', 'HomeController@deleteaccount')->middleware('verified');

Route::delete('account/delete/account', 'HomeController@deleteconfirm')->middleware('verified');


Route::get('/reserveringen/dag',
    'ReservationController@getDay')->name('home')->middleware('notBlocked')->middleware('verified');

Route::get('/reserveringen/week',
    'ReservationController@getWeek')->name('home')->middleware('notBlocked')->middleware('verified');

Route::get('/reserveringen/maand',
    'ReservationController@getMonth')->name('home')->middleware('notBlocked')->middleware('verified');


Route::get('/account/{user}',
    ['as' => 'users.edit', 'uses' => 'UserController@edit'])->middleware('verified')->middleware('notBlocked');
Route::patch('/account/{user}',
    ['as' => 'users.update', 'uses' => 'UserController@update'])->middleware('verified')->middleware('notBlocked');

Route::get('/reservering', function () {
    return view('reservation');
})->middleware('verified')->middleware('notBlocked');

Route::post('/reservering',
    'ReservationController@createReservation')->middleware('verified')->middleware('notBlocked');

Route::get('/blocked',[ 'as' => 'blocked', function () {
    return view('blocked');
}]);

Route::get('/blockedByAdmin',[ 'as' => 'blocked', function () {
    return view('blockedByAdmin');
}]);
Route::get('beheer/reservering/nota/{id}', 'receiptController@getReceipt')->middleware('verified');
Route::get('/get-tables', 'TableController@getTables')->middleware('verified')->middleware('notBlocked');

Route::get('reservering/nota/{id}', 'receiptController@downloadPDFbyUser')->middleware('verified');


// Admin routes
Route::get('/beheer', function () {
    return view('admin.home');
})->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/bestellingen',
    'OrderController@getOrders')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/createOrder', 'OrderController@getData')->name('home')->middleware('admin')->middleware('notBlocked');


Route::get('/beheer/reserveringen',
    'ReservationController@adminGet')->name('home')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/reserveringen/dag',
    'ReservationController@adminGetDay')->name('home')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/reserveringen/week',
    'ReservationController@adminGetWeek')->name('home')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/reserveringen/maand',
    'ReservationController@adminGetMonth')->name('home')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/gebruikers',
    'UserController@index')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::patch('/beheer/gebruikers', 'UserController@index')->middleware('admin')->middleware('verified');

Route::get('/beheer/gebruikers/{user}',
    ['as' => 'users.adminEdit', 'uses' => 'UserController@adminEdit'])->middleware('verified')->middleware('admin');

Route::patch('/beheer/gebruikers/{user}',
    ['as' => 'users.adminUpdate', 'uses' => 'UserController@adminUpdate'])->middleware('verified')->middleware('admin');

Route::delete('/beheer/gebruikers/{user}',
    ['as' => 'users.adminDelete', 'uses' => 'UserController@adminDelete'])->middleware('verified')->middleware('admin');


Route::get('beheer/reservering/nota/download/{id}', 'receiptController@downloadPDF')->middleware('verified')->middleware('admin');

// API

Route::post('/get-reserved', 'TableController@getReservedTable');

Route::post('/get-tables-cap', 'TableController@getTablesCapacity');

Route::post('/toggle-block/{user}', 'UserController@toggleBlock');

Route::post('/beheer/createOrder', 'OrderController@getDishes');

