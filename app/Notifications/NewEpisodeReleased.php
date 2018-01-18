<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Facebook\FacebookMessage;
use NotificationChannels\Twilio\TwilioSmsMessage;

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
            ->content("New Stauffers on Science available! '" . $this->episode->get_title() . "', available: " . $this->episode->get_permalink());
    }

    public function toFacebook($notifiable)
    {
        return FacebookMessage::create("There's a new episode of Stauffers on Science available!\n\n'" . $this->episode->get_title() . "', available: " . $this->episode->get_permalink())
            ->to($notifiable->facebook_id);
    }
}
