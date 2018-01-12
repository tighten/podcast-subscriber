<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'sms'], function () {
    Route::get('subscribe', 'SmsSubscriptionController@create');
    Route::post('subscribe', 'SmsSubscriptionController@store');
    Route::get('subscribed', 'SmsSubscriptionController@complete');
});

Route::group(['prefix' => 'facebook'], function () {
    Route::get('subscribe', 'FacebookSubscriptionController@instructions');
    Route::get('subscribed', 'FacebookSubscriptionController@complete');
    Route::get('message', 'FacebookSubscriptionController@handleMessageWebhook');
});
