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

    public function handleMessageWebhook()
    {
        \Log::info(request()->all());
        return 'Hey successful for FB verification!';
        // @todo: handle the webhook for a chat message and grab user id
        $user = User::firstOrNew(['facebook_id' => $user->id])->save();

        return redirect('/facebook/subscribed');
    }

    public function complete()
    {
        return view('facebook.subscribed');
    }
}
