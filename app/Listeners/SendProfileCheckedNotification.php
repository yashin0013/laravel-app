<?php

namespace App\Listeners;

use App\Events\SomeoneCheckedProfile;
use App\Mail\ProfileCheckedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendProfileCheckedNotification implements ShouldQueue
{

    public int $delay = 5;

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
    public function handle(SomeoneCheckedProfile $event): void
    {
        Mail::to($event->user->email)->send(new ProfileCheckedMail($event->user));
    }
}
