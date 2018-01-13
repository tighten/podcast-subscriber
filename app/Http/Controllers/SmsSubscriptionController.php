<?php

namespace App\Http\Controllers;

use App\Notifications\Subscribed;
use App\User;
use Illuminate\Http\Request;
use Propaganistas\LaravelPhone\PhoneNumber;

class SmsSubscriptionController extends Controller
{
    public function create()
    {
        return view('sms.subscribe');
    }

    public function store()
    {
        request()->validate([
            'subscribe-sms-phone-number' => 'required|phone:US'
        ], [
            'phone' => 'Invalid U.S. phone number',
            'required' => 'You need to provide a phone number to subscribe'
        ]);

        $number = PhoneNumber::make(request('subscribe-sms-phone-number'))->ofCountry('US');

        $user = User::firstOrNew(['phone_number' => $number->formatE164()])->save();

        $user->notify(new Subscribed);

        return redirect('/sms/subscribed');
    }

    public function complete()
    {
        return view('sms.subscribed');
    }
}
