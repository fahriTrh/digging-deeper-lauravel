<?php

namespace App\Listeners;

use App\Events\EmailHasSent;
use App\Notifications\DatabaseNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Notification;

class EmailHasSentNotif
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EmailHasSent $event): void
    {
        $user = $event->user;
        $type = 'email-has-sent';
        Notification::send($user, new DatabaseNotification($user, $type));
    }
}
