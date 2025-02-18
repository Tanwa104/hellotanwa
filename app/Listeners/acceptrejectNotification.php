<?php

namespace App\Listeners;

use App\Events\acceptreject;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class acceptrejectNotification
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
    public function handle(acceptreject $event): void
    {
        //
    }
}
