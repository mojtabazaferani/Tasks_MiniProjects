<?php

namespace App\Listeners;

use App\Events\CustomerOrdered;
use App\Models\Message;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAdminOrderNotification
{
 
    public function __construct()
    {
        
    }

    public function handle(CustomerOrdered $event): void
    {
        $create = $event->create;

        $message = "The User : " . $create->username . "Registered";

        Message::create([
            'message' => $message
        ]);
    }
}
