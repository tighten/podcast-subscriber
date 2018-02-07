<?php

namespace Tests\BotMan;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;

class FacebookSubscriptionTest extends BotManTestCase
{
    use RefreshDatabase;

    /** @test */
    function get_started_greets_users()
    {
        $buttons = ButtonTemplate::create('Hi! You can subscribe to our podcast, so you will be notified when we have new episodes available.')
            ->addButton(ElementButton::create('Subscribe')->type('postback')->payload('subscribe'));

        $this->bot->receives('get_started')
            ->assertTemplate(ButtonTemplate::class);

        $this->assertEquals($this->bot->getMessages()[0], $buttons);
    }

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
