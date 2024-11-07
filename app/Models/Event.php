<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'event_type',
        'event_date',
        'event_time',
        'location',
        'description',
        'ticket_price',
        'poster_url',
        'availability_status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'event_date' => 'date',
        'event_time' => 'string',
        'availability_status' => 'boolean',
        'ticket_price' => 'decimal:2',
    ];

    public function eventType()
    {
        return $this->belongsTo(Event_Type::class, 'event_type', 'name');
    }
}
