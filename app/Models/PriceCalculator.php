<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceCalculator extends Model
{
  protected $fillable = [
    'name',
    'email',
    'country',
    'tel',
    'phone_call',
    'campus',
    'media',
    'time_to_start',
    'message',
    'utm_source',
  ];
}
