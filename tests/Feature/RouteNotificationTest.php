<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
}
