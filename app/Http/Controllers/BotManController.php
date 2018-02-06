<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;

class BotManController extends Controller
{
    public function handle()
    {
        app('botman')->listen();
    }

    public function tinker()
    {
        if (! app()->environment(['local', 'staging'])) {
            abort();
        }

        return view('botman.tinker');
    }
}
