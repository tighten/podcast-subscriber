<?php

namespace Tests\BotMan;

use App\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BotMan\BotManTestCase;

class FacebookSubscriptionTest extends BotManTestCase
{
    use RefreshDatabase;

    /** @test */
    function subscribe_subscribes_user()
    {
        $this->bot->receives('subscribe');

        $this->assertEquals(1, User::count());
    }

    /** @test */
    function unsubscribe_unsubscribes_user()
    {
        $this->bot->receives('subscribe');
        $this->bot->receives('unsubscribe');

        $this->assertEquals(0, User::count());
    }
}
