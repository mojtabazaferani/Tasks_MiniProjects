<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\AlertNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class SendNewUserNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */


    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admins = User::whereHas('roles', function($query) {
            $query->where('id', 1);
        })->get();

        FacadesNotification::send($admins, new AlertNotification($event->user));
    }
}
