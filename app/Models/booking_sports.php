<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class booking_sports extends Model
{
    use HasFactory;
    protected $table = 'booking_sports';

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
        'sport_id',
        'name',
    ];
}
