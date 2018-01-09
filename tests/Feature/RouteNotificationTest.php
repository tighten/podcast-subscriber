<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use NotificationChannels\Facebook\FacebookChannel;
use NotificationChannels\Twilio\TwilioChannel;
use Tests\TestCase;

class RouteNotificationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function users_with_phone_numbers_are_notified_via_twilio()
    {
        $user = new User([
            'phone_number' => '+13138675309',
        ]);

        $this->assertEquals(TwilioChannel::class, $user->notificationChannel());
    }

    /** @test */
    function users_with_facebook_ids_are_notified_via_messenger()
    {
        $user = new User([
            'facebook_id' => '12345',
        ]);

        $this->assertEquals(FacebookChannel::class, $user->notificationChannel());
    }
}
