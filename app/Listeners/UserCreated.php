<?php

namespace App\Listeners;

use App\Events\UserCreated as EventsUserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserCreated
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
     * @param  object  $event
     * @return void
     */
    public function handle(EventsUserCreatedeated $event)
    {
        //
        broadcast($event->user);
    }
}
