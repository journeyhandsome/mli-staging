<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeTrial extends Model
{
  protected $fillable = [
    'name',
    'email',
    'phone',
    'phone_call',
    'nationality',
    'campus',
    'date_schedule',
    'time_schedule',
    'message',
    'utm_source',
  ];
}
