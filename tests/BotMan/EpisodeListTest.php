<?php

namespace Tests\BotMan;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BotMan\BotManTestCase;

class EpisodeListTest extends BotManTestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_lists_episodes()
    {
        $this->markTestIncomplete();
        // $this->bot->receives('episodes')->assertReply('abc');
    }
}
