<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sport extends Model
{
    use HasFactory;

    protected $table = 'sports';

    // Fields that can be mass-assigned
    protected $fillable = [
        'title',
        'sport_type',
        'event_date',
        'event_time',
        'team_a',
        'team_b',
        'location',
        'ticket_price',
        'poster_url',
        'availability_status',
    ];

    /**
     * Additional fields that can be cast to specific types.
     */
    protected $casts = [
        'event_date' => 'date',
        'event_time' => 'datetime:H:i',
        'ticket_price' => 'decimal:2',
        'availability_status' => 'boolean',
    ];

    public function sportType()
    {
        return $this->belongsTo(Sport_type::class, 'sport_type', 'name');
    }
}
