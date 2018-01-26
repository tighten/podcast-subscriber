<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacebookSubscriptionController extends Controller
{
    public function instructions()
    {
        return view('facebook.instructions');
    }
}
