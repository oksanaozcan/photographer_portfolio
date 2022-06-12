<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $guarded = [];

  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }

  public function theme()
  {
    return $this->belongsTo(Theme::class);
  }

}
