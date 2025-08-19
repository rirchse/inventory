<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
  protected $fillable = [
    'shop_id',
    'supplier_id',
    'purchased_by',
    'voucher_no',
    'date',
    'total',
    'discount',
    'shipping',
    'grand_total',
    'paid',
    'due',
    'note',
    'created_by'
  ];
}
