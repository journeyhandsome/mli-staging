<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineApplication extends Model
{
    use HasFactory;
    protected $table = "online_applications";
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'name',
        'birthday',
        'gender',
        'phone',
        'email',
        'nationality',
        'country',
        'student_visa_application',
        'campus',
        'accommodation_arrangements',
        'promo_code',
        'message',
        'lesson_start_date',
        'length_of_program',
        'language',
        'stripe_key',
    ];

}
