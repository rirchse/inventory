<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
  protected $fillable = [
    'shop_id', 
    'customer_id', 
    'user_id',
    'sms',
    'created_at'
  ];

  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }
}
