<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
  use HasFactory;

  protected $fillable = [
    "questions",
    "cereated_at",
    "updated_at"
  ];
  protected $casts = [
    'questions' => 'json',
  ];
}
