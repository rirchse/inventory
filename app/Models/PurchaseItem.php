<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
  protected $fillable = [
    'purchase_id',
    'product_id',
    'unit_price',
    'quantity',
    'sub_total'
  ];
}
