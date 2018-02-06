<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacebookSubscriptionController extends Controller
{
    public function __construct()
    {
        if (! config('services.facebook.page-token')) {
            abort('Facebook not configured.');
        }
    }

    public function instructions()
    {
        return view('facebook.instructions');
    }
}
