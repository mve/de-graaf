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

//Route::post('modified', 'LoginController@modified');
Route::get('/', function () {
    return view('home');
});


//Route::get('/menupdf', function () {
//    return view('admin.menupdf');
//});

Route::get('/menupdf', 'ProductController@downloadMenu');

Route::get('/contact', function () {
    return view('contact');
})->middleware('notBlocked');

Route::post('/contact', 'Controller@sendmail');

Route::get('/menu',
    'ProductController@index');

// User routes

Route::get('/', 'HomeController@index');
Route::get('/account', 'HomeController@edit')->middleware('verified');

Route::post('/review', 'HomeController@placeReview');


Route::post('/get-reserved', 'TableController@getReservedTable');

Route::post('/get-tables-by-id', 'TableController@getTablesById');

Route::get('account/delete/{id}', 'HomeController@deleteReservation')->middleware('verified');

Route::get('delete-account', 'HomeController@deleteaccount')->middleware('verified');

Route::delete('delete-account', 'HomeController@deleteconfirm')->middleware('verified');


Route::get('/account/{user}',
    ['as' => 'users.edit', 'uses' => 'UserController@edit'])->middleware('verified')->middleware('notBlocked');
Route::patch('/account/{user}',
    ['as' => 'users.update', 'uses' => 'UserController@update'])->middleware('verified')->middleware('notBlocked');

Route::get('/reservering', function () {
    return view('reservation');
})->middleware('verified')->middleware('notBlocked');

Route::post('/reservering',
    'ReservationController@createReservation')->middleware('verified')->middleware('notBlocked');

Route::get('/blocked', [
    'as' => 'blocked',
    function () {
        return view('blocked');
    }
]);

Route::get('/blockedByAdmin', [
    'as' => 'blocked',
    function () {
        return view('blockedByAdmin');
    }
]);
Route::get('beheer/reservering/nota/{id}', 'receiptController@getReceipt')->middleware('verified');
Route::get('/get-tables', 'TableController@getTables')->middleware('verified')->middleware('notBlocked');

Route::get('reservering/nota/{id}', 'receiptController@downloadPDFbyUser')->middleware('verified');


// Admin routes
Route::get('/beheer', function () {
    return view('admin.home');
})->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/bestellingen',
    'OrderController@getOrders')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/bestellingen/bar',
    'OrderController@getBarOrders')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/bestellingen/keuken',
    'OrderController@getKitchenOrders')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/createOrder',
    'OrderController@getData')->name('home')->middleware('admin')->middleware('notBlocked');


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

Route::get('beheer/reservering/nota/download/{id}',
    'ReceiptController@downloadPDF')->middleware('verified')->middleware('admin');

Route::get('/beheer/reserveren', function () {
    return view('admin.createReservation');
})->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::post('beheer/reserveren', 'ReservationController@adminCreate')->middleware('verified')->middleware('admin');

Route::delete('beheer/reservering/{id}',
    'ReservationController@adminDelete')->middleware('verified')->middleware('admin');


Route::get('/beheer/gerechten',
    'ProductController@adminindex')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/gerechten/toevoegen',
    'ProductController@createProduct')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::post('/beheer/gerechten/toevoegen',
    'ProductController@addProduct')->middleware('admin')->middleware('notBlocked')->middleware('verified');

Route::get('/beheer/gerechten/delete/{id}',
    'ProductController@deleteProduct')->middleware('admin')->middleware('notBlocked')->middleware('verified');
// API

Route::post('/get-reserved', 'TableController@getReservedTable');

Route::post('/get-tables-cap', 'TableController@getTablesCapacity');

Route::post('/toggle-block/{user}', 'UserController@toggleBlock');

// Doormiddel van deze route halen we de producten op met de meegegeven categorie
Route::post('/beheer/getProducts', 'OrderController@getDishes');

Route::post('/beheer/createOrder', 'OrderController@createOrder');

Route::get('beheer/deleteOrder/{id}', 'OrderController@deleteOrder');

Route::get('beheer/preparedorder/{id}', 'OrderController@preparedOrder');


