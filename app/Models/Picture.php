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

  public function order()
  {
    return $this->belongsTo(Customer::class);
  }

  public function theme()
  {
    return $this->belongsTo(Theme::class);
  }

  public function customer()
  {
    return $this->hasOneThrough(
      Customer::class, 
      Order::class, 
      'customer_id', 
      'id', 
      'order_id'
    );
  }

}
