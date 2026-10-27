<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'image',
      'nationality_id',
      'campus_id',
      'user_id',
  ];

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'foreign_key');
    }
}
