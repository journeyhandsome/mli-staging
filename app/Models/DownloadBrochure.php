<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadBrochure extends Model
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
  ];
}
