<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LptfContacts extends Model
{
  protected $fillable = [
    'name',
    'email',
    'phone',
    'phone_call',
    'country',
    'campus',
    'media',
    'message',
    'utm_source',
  ];
}
