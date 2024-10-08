<?php

/*namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow; //sync driver
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Show;
use App\Http\Resources\Show\ShowResource;

class ShowsDoneEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $show;
    private $path;
   
    public function __construct(ShowResource $show, string $path)
    {   
        $this->show = $show;
        $this->path = $path;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('shows-channel.'.$this->path);
    }

    public function broadcastAs(): string
    {
        return 'shows-app';
    }

    public function broadcastWith(): array
    {

        return ['show' => ShowResource::make($this->show)];       

    }

}*/
