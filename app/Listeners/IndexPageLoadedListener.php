<?php

namespace App\Listeners;

use App\Events\IndexPageLoaded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Pusher\Pusher;

class IndexPageLoadedListener
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
     * @param  \App\Events\IndexPageLoaded  $event
     * @return void
     */
    public function handle(IndexPageLoaded $event)
    {
        $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'));

        // Your Pusher logic here
        $pusher->trigger('my-channel', 'index-page-loaded', ['message' => 'Index page loaded']);
    }
}
