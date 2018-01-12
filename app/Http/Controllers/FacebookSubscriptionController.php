<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Socialite;

class FacebookSubscriptionController extends Controller
{
    public function instructions()
    {
        return view('facebook.instructions');
    }

    public function getMessageWebhook()
    {
        if (request('hub_verify_token')) {
            if (request('hub_verify_token') == config('services.facebook.page-token')) {
                return request('hub_challenge');
            }

            exit('Invalid token');
        }
    }

    public function postMessageWebhook()
    {
        if (! array_key_exists('messaging', request('entry')[0])) {
            \Log::info('skipping a request...');
            // not really sure what these are for... ¯\(°_o)/¯
            return;
        }

        $messaging = request('entry')[0]['messaging'][0];
        $userId = array_get($messaging, 'sender.id');
        $message = array_get($messaging, 'message.text');

        if (str_contains(strtolower($message), 'subscribe')) {
            \Log::info('FB User subscribed! ' . $userId);
            $user = User::firstOrNew(['facebook_id' => $userId])->save();

            return 'uh how do i message yayyyy back?';
        } else {
            \Log::info('FB User ' . $userId . ' sent non-subscribe message: ' . $message);
            return 'uh how do i message boooo back';
        }
    }
}
