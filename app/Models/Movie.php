<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'genre',
        'release_date',
        'rating',
        'runtime',
        'director',
        'cast',
        'synopsis',
        'language',
        'country',
        'poster_url',
        'trailer_url',
        'availability_status',
        'screening_times',
        'ticket_price',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'release_date' => 'date',
        'rating' => 'decimal:1',
        'screening_times' => 'json',
        'availability_status' => 'boolean',
        'ticket_price' => 'decimal:2',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movie');
    }
}
