<?php

namespace App\Listeners;

use App\Events\BatchUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Item;

class BatchUpdatedListener
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
    public function handle(BatchUpdated $event): void
    {
        $item = $event->item;

        if ($event->add_reduce === 'add') {
            $item->update([
                'stock' => $item->stock + $event->amount,
            ]);
        } elseif ($event->add_reduce === 'reduce') {
            $item->update([
                'stock' => $item->stock - $event->amount,
            ]);
        }

    }
}
