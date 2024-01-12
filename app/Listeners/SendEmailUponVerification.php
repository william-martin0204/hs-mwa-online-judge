<?php

namespace App\Listeners;

use App\Notifications\WelcomeNewUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailUponVerification implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
        $event->user->notify(new WelcomeNewUser());
    }
}
