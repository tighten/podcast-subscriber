<?php

namespace App\Jobs;

use App\Notifications\NewEpisodeReleased;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class NotifySubscribersOfNewEpisode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** SimplePie item */
    protected $episode;

    public function __construct($episode)
    {
        $this->episode = $episode;
    }

    public function handle()
    {
        Notification::send(User::all(), new NewEpisodeReleased($this->episode));

        $this->pingIfttt();
    }

    public function pingIfttt()
    {
        if (! config('services.ifttt.webhook_key')) {
            return;
        }

        (new \GuzzleHttp\Client)->post(
            'https://maker.ifttt.com/trigger/new_episode/with/key/' . config('services.ifttt.webhook_key'),
            [
                'form_params' => ['value1' => 'blue'],
            ]
        );
    }
}
