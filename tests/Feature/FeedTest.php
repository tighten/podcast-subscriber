<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeedTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function new_episodes_trigger_notification()
    {
        $this->markTestIncomplete();
    }

    /** @test */
    function new_episodes_are_saved_to_db()
    {
        $this->markTestIncomplete();
    }

    /** @test */
    function old_episodes_dont_trigger_notification()
    {
        $this->markTestIncomplete();
    }
}
