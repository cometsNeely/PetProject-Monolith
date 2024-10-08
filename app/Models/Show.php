<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Show\ShowResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\BroadcastsEvents;

class Show extends Model
{
    use HasFactory, BroadcastsEvents;

    /*public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }*/

    public function broadcastOn(string $event): array
    {
        return [
            new Channel('shows-channel.'.$this->category),
        ];
    }

    public function broadcastAs(string $event): string|null
    {
        return 'shows-app';
    }

    public function broadcastWith(string $event): array
    {
        return ['show' => ShowResource::make($this)];       
    }

    protected $fillable = [
        'name',
        'category',
        //'description',
        //'rating',
    ];
    //protected $guarded = [];
}
