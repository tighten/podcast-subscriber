<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Facebook\FacebookMessage;
use NotificationChannels\Twilio\TwilioSmsMessage;
use NotificationChannels\Twitter\TwitterStatusUpdate;

class NewEpisodeReleased extends Notification
{
    use Queueable;

    /** SimplePie item */
    protected $episode;

    public function __construct($episode)
    {
        $this->episode = $episode;
    }

    public function via($notifiable)
    {
        return $notifiable->notificationChannel();
    }

    public function toTwilio($notifiable)
    {
        return (new TwilioSmsMessage)
            ->content("New " . config('app.name') . " available! '" . $this->episode->get_title() . "', : " . $this->episode->get_permalink());
    }

    public function toFacebook($notifiable)
    {
        return FacebookMessage::create("There's a new episode of " . config('app.name') . " available!\n\n'" . $this->episode->get_title() . "', available: " . $this->episode->get_permalink())
            ->to($notifiable->facebook_id);
    }

    public function toTwitter($notifiable)
    {
        return new TwitterStatusUpdate("New " . config('app.name') . " available! '" . $this->episode->get_title() . "', : " . $this->episode->get_permalink());
    }
}
