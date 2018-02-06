<?php

Route::view('/', 'welcome');
Route::view('terms', 'terms-of-service');
Route::view('privacy', 'privacy-policy');

Route::group(['prefix' => 'sms'], function () {
    Route::get('subscribe', 'SmsSubscriptionController@create');
    Route::post('subscribe', 'SmsSubscriptionController@store');
    Route::get('subscribed', 'SmsSubscriptionController@complete');
});

Route::get('facebook/subscribe', 'FacebookSubscriptionController@instructions');

Route::match(['get', 'post'], 'botman', 'BotManController@handle');
Route::get('botman/tinker', 'BotManController@tinker');
