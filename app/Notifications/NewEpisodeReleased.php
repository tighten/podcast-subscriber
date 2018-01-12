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

    public function __construct()
    {
    }

    public function via($notifiable)
    {
        return $notifiable->notificationChannel();
    }

    public function toTwilio($notifiable)
    {
        return (new TwilioSmsMessage)
            ->content("There's a new episode of Stauffers on Science available! http://www.stauffersonscience.com/");
    }

    public function toFacebook($notifiable)
    {
        return FacebookMessage::create("There's a new episode of Stauffers on Science available! http://www.stauffersonscience.com/")
            ->to($notifiable->facebook_id);
    }
}
