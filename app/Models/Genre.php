<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'movies_genres';
    protected $fillable = ['name']; // Allow mass assignment for the name attribute

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'genre_movie');
    }
}
