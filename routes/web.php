<?php

use App\User;
use Propaganistas\LaravelPhone\PhoneNumber;

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

Route::group(['prefix' => 'sms'], function () {
    Route::get('subscribe', function () {
        return view('sms.subscribe');
    });

    Route::post('subscribe', function () {
        request()->validate([
            'subscribe-sms-phone-number' => 'required|phone:US'
        ], [
            'phone' => 'Invalid U.S. phone number',
            'required' => 'You need to provide a phone number to subscribe'
        ]);

        $number = PhoneNumber::make(request('subscribe-sms-phone-number'))->ofCountry('US');

        $user = User::firstOrNew(['phone_number' => $number->formatE164()])->save();

        return redirect('/sms/subscribed');
    });

    Route::get('subscribed', function () {
        return view('sms.subscribed');
    });
});

Route::group(['prefix' => 'facebook'], function () {
    Route::get('subscribe', function () {
        return view('facebook.subscribe');
    });

    Route::post('subscribe', function () {
        return 'not programmed yet';

        request()->validate([
            'subscribe-sms-phone-number' => 'required|phone:US'
        ], [
            'phone' => 'Invalid U.S. phone number',
            'required' => 'You need to provide a phone number to subscribe'
        ]);

        $number = PhoneNumber::make(request('subscribe-sms-phone-number'))->ofCountry('US');

        $user = User::firstOrNew(['phone_number' => $number->formatE164()])->save();

        return redirect('/facebook/subscribed');
    });

    Route::get('subscribed', function () {
        return view('facebook.subscribed');
    });
});
