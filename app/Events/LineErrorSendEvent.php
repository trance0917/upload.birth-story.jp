<?php

namespace App\Events;

use App\Models\LogLineMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LineErrorSendEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $log_line_message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(LogLineMessage $log_line_message)
    {
        $this->log_line_message = $log_line_message;
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
