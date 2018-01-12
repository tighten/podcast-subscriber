<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Socialite;

class FacebookSubscriptionController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
        } catch (Exception $e) {
            return redirect()->back();
        }

        // @todo: Do we want ->name, ->email, ->token? Guess not?
        $user = User::firstOrNew(['facebook_id' => $user->id])->save();

        return redirect('/facebook/subscribed');
    }

    public function complete()
    {
        return view('facebook.subscribed');
    }
}
