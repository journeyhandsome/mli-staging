<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddPayment extends Model
{
    use HasFactory;
    protected $table = "add_payment";
    protected $fillable = [
        'date',
        'campus',
        'fname',
        'lname',
        'agency',
        'amount',
        'percent',
        'payment_details',
        'payment_others',
        'language',
        'stripe_key',
        'is_sent',
    ];

}
