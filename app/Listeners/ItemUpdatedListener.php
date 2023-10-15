<?php

namespace App\Listeners;

use App\Events\ItemUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\ItemHistory;

class ItemUpdatedListener
{
    /**
     * Handle the event.
     */
    public function handle(ItemUpdated $event)
    {
        if ($event->item) {
            ItemHistory::create([
                'item' => $event->item->id,
                'updated_by' => $event->user->id,
            ]);
        }
    }
}
