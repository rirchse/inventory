<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  protected $fillable = [
    'shop_id',
    'product_id',
    'unit_name',
    'quantity'
  ];
}
