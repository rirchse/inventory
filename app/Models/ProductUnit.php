<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductUnit extends Model
{
  protected $fillable = [
    'product_id', 
    'unit_name', 
    'unit_symbol', 
    'unit_price', 
    'base_unit', 
    'is_base_unit'
  ];
}
