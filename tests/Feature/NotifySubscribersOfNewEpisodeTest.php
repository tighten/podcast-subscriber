<?php

namespace Tests\Feature;

use App\Jobs\NotifySubscribersOfNewEpisode;
use App\Notifications\NewEpisodeReleased;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\Facebook\FacebookChannel;
use NotificationChannels\Twilio\TwilioChannel;
use Tests\TestCase;

class NotifySubscribersOfNewEpisodeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function subscribers_are_sent_new_episode_notification()
    {
        factory(User::class, 5)->create();

        Notification::fake();

        dispatch(new NotifySubscribersOfNewEpisode);

        Notification::assertSentTo(
            User::all(), NewEpisodeReleased::class
        );
    }

    /** @test */
    function subscribers_are_notified_via_appropriate_channels()
    {
        $smsUser = User::create([
            'phone_number' => '+13138675309',
        ]);

        $facebookUser = User::create([
            'facebook_id' => '12345',
        ]);

        Notification::fake();

        dispatch(new NotifySubscribersOfNewEpisode);

        Notification::assertSentTo(
            $smsUser,
            NewEpisodeReleased::class,
            function ($notification, $channels) {
                return $channels == TwilioChannel::class;
            }
        );

        Notification::assertSentTo(
            $facebookUser,
            NewEpisodeReleased::class,
            function ($notification, $channels) {
                return $channels == FacebookChannel::class;
            }
        );
    }
}
