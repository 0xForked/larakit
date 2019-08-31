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

    Route::get('/settings', 'SettingController@index')->name('setting');

    Route::post(
        '/settings/message-autoreply',
        'SettingController@update'
    )->name('setting.autoreply');

    Route::get('/messages/inbox', 'Messaging\InboxController@index')->name('messaging.inbox');
    Route::get('/messages/outbox', 'Messaging\OutboxController@index')->name('messaging.outbox');
    Route::get('/messages/pending', 'Messaging\PendingController@index')->name('messaging.pending');
    Route::post('/messages/send', 'Messaging\OutboxController@store')->name('messaging.send');

});
