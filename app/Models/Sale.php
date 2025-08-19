<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  protected $fillable = [
    'shop_id',
    'order_no',
    'customer_id',
    'sub_total',
    'discount',
    'shipping',
    'grand_total',
    'paid',
    'due',
    'sales_date',
    'shipping_address',
    'details',
    'sold_by',
    'status',
    'created_by',
    'vat',
    'tax',
  ];
}
