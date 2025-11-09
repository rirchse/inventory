<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductUnit extends Model
{
  protected $fillable = [
    'product_id', 
    'product_unit_id', 
    'unit_name', 
    'unit_symbol', 
    'unit_price', 
    'base_unit', 
    'is_base_unit'
  ];

  public function stock()
  {
    return $this->hasOne(Stock::class, 'product_unit_id');
  }
}
