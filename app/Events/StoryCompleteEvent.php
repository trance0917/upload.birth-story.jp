<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoryCompleteEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $contact;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(\App\Models\TblPatient $tbl_patient)
    {
        $this->tbl_patient = $tbl_patient;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
