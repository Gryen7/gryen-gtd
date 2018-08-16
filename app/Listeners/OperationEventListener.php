<?php

namespace App\Listeners;

use App\Events\OperationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OperationEventListener
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
     * @param  OperationEvent  $event
     * @return void
     */
    public function handle(OperationEvent $event)
    {
        //
    }
}
