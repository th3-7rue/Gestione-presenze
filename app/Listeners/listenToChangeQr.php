<?php

namespace App\Listeners;

use App\Events\changeQr;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class listenToChangeQr
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
    public function handle(changeQr $event): void
    {
        //
    }
}
