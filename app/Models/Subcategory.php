<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
  protected $fillable = [
    'shop_id',
    'name',
    'category_id',
    'details',
    'status',
    'created_by'
  ];
  public function category()
    {
    	return $this->belongsTo(Category::class);
    }

}
