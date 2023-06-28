<?php

namespace App\Listeners;

use App\Events\RegisterdUser;
use App\Mail\VerifyMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailVerifyNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\RegisterdUser  $event
     * @return void
     */
    public function handle(RegisterdUser $event)
    {
        $user = $event->getUser();
        Mail::to($user->email)->send(new VerifyMail($user));
    }
}
