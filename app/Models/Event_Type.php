<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event_Type extends Model
{
    use HasFactory;
    protected $table = 'event_type';
    protected $fillable = ['name'];

    public function events()
    {
        return $this->hasMany(Event::class, 'event_type', 'name');
    }

}
