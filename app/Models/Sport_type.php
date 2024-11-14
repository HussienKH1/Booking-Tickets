<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sport_type extends Model
{
    use HasFactory;
    protected $table = 'sport_type';
    protected $fillable = ['name'];

    public function sport()
    {
        return $this->belongsTo(Sport::class, 'sport_type', 'name');
    }
}
