<?php

namespace App;

use Exception;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use NotificationChannels\Facebook\FacebookChannel;
use NotificationChannels\Twilio\TwilioChannel;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone_number', 'facebook_id'
    ];

    public function notificationChannel()
    {
        if ($this->phone_number) {
            return TwilioChannel::class;
        }

        if ($this->facebook_id) {
            return FacebookChannel::class;
        }

        throw new Exception('Un-notifiable user');
    }
}
