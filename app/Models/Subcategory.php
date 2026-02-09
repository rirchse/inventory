<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
  protected $fillable = [
    'shop_id',
    'name',
    'details',
    'status',
    'created_by'
  ];

}
