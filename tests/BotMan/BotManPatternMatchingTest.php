<?php

namespace Tests\BotMan;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BotMan\BotManTestCase;

class BotManPatternMatchingTest extends BotManTestCase
{
    use RefreshDatabase;

    /** @test */
    function matches_all_hellos()
    {
        // @todo: move these messages into translations so we can access them globally.
        $responseMessage = 'Hello! What can I do for you today? Try "info" for more information.';

        $this->bot->receives('Hello!')->assertReply($responseMessage);
        $this->bot->receives('Hello there!')->assertReply($responseMessage);
        $this->bot->receives('hello')->assertReply($responseMessage);
        $this->bot->receives('Uhh, hello?')->assertReply($responseMessage);
        $this->bot->receives('Hi')->assertReply($responseMessage);
        $this->bot->receives('hi')->assertReply($responseMessage);
    }

    /** @test */
    function matches_all_helps()
    {
        $responseMessage = 'Right now, your best option is to send the message "subscribe", which will sign you up to be notified when we have new episodes; or "unsubscribe" if you want to stop receiving notifications.';

        $this->bot->receives('info')->assertReply($responseMessage);
        $this->bot->receives('Info')->assertReply($responseMessage);
        $this->bot->receives('Can I get some more info')->assertReply($responseMessage);
        $this->bot->receives('Information please?')->assertReply($responseMessage);
    }

    /** @test */
    function matches_all_subscribes()
    {
        $responseMessage = "You're now subscribed to Stauffers on Science!";

        $this->bot->receives('subscribe')->assertReply($responseMessage);
        $this->bot->receives('Subscribe')->assertReply($responseMessage);
        $this->bot->receives('Subscribe me')->assertReply($responseMessage);
    }


    /** @test */
    function matches_all_unsubscribes()
    {
        $responseMessage = "You're now unsubscribed from Stauffers on Science!";

        $this->bot->receives('unsubscribe')->assertReply($responseMessage);
        $this->bot->receives('Unsubscribe')->assertReply($responseMessage);
        $this->bot->receives('Unsubscribe me')->assertReply($responseMessage);
    }
}
