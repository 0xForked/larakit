<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api\V1',
    'as' => 'api.',
    'middleware' => 'auth:api'
], function () {
    Route::get('/profile', 'Profile\ProfileController@index')->name('profile');
    Route::post(
        '/profile/basic-information',
        'Profile\UpdateBasicInformationController@index'
    )->name('profile.basic-info');
    Route::post(
        '/profile/update-password',
        'Profile\UpdatePasswordController@index'
    )->name('profile.password');
});
