<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
    'shop_id',
    'category_id',
    'subcategory_id',
    'name',
    'details',
    'status',
    'created_by'
  ];
}
