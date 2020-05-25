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

Route::get('/', function () {
    return view('welcome');
});

Route::get('book', function () {
    return view('book');
});

Route::get('bus', function () {
    return redirect()->action('BusController@index');
});

Route::get('/bus', function () {
    return redirect()->action('BusController@index');
});

Route::resource('buses', 'BusController');

Route::get('seat', function () {
    return redirect()->action('SeatController@index');
});

Route::get('/seat', function () {
    return redirect()->action('SeatController@index');
});

Route::resource('seats', 'SeatController');

Route::get('user', function () {
    return redirect()->action('UserController@index');
});

Route::get('/user', function () {
    return redirect()->action('UserController@index');
});

Route::resource('users', 'UserController');

Route::get('book', function () {
    return view('book');
});

Route::post('make_booking', 'SeatController@makeBooking');