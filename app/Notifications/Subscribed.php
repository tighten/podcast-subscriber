<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Facebook\FacebookMessage;
use NotificationChannels\Twilio\TwilioSmsMessage;

class Subscribed extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return $notifiable->notificationChannel();
    }

    public function toTwilio($notifiable)
    {
        return (new TwilioSmsMessage)
            ->content("You're now subscribed to Stauffers on Science!");
    }

    public function toFacebook($notifiable)
    {
        return FacebookMessage::create("You're now subscribed to Stauffers on Science!")
            ->to($notifiable->facebook_id);
    }
}
