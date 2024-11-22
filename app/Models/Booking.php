<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'ticket_count',
        'ticket_price',
        'total_price',
        'vat',
        'amount_payable',
        'type',
        'name',
    ];

}
