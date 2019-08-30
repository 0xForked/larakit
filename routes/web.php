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

Auth::routes([
    'register' => true,
    'reset' => true,
    'verify' => true
]);

Route::group([
    'prefix'=>'dashboard',
    'as' => 'dash.',
    'namespace' => 'Dash'
], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/messaging', 'MessagingController@index')->name('messaging');
    Route::get('/account', 'AccountController@index')->name('account');
});
