<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
  protected $fillable = [
    'name',
    'email',
    'phone',
    'phone_call',
    'country',
    'campus',
    'time_to_start',
    'media',
    'message',
    'is_promo',
    'utm_source',
    '2nd_email',
    'second_email',
  ];
}
