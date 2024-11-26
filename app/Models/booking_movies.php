<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class booking_movies extends Model
{
    use HasFactory;
    protected $table = 'booking_movies';

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone_number',
        'ticket_count',
        'ticket_price',
        'total_price',
        'vat',
        'amount_payable',
        'movie_id',
        'name',
    ];
}
