<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $guarded = [];

  protected $with = ['customer'];

  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }

  public function pictures()
  {
    return $this->hasMany(Picture::class);
  }
}
