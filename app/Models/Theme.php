<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $guarded = [];
  protected $withCount = ['pictures'];

  public function pictures()
  {
    return $this->hasMany(Picture::class);
  }
}
