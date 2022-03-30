<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTopic extends Model
{
    use HasFactory;
    protected $table = 'room_topics';
/**
 * Get the Room that owns the RoomTopic
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_name', 'name');
    }

}
