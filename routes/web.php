<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('terms', function () {
    return view('terms-of-service');
});

Route::get('privacy', function () {
    return view('privacy-policy');
});

Route::group(['prefix' => 'sms'], function () {
    Route::get('subscribe', 'SmsSubscriptionController@create');
    Route::post('subscribe', 'SmsSubscriptionController@store');
    Route::get('subscribed', 'SmsSubscriptionController@complete');
});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('botman/tinker', 'BotManController@tinker');
