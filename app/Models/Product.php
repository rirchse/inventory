<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function productUnit()
  {
    return $this->hasMany(ProductUnit::class, 'product_id');
  }
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
    	return $this->belongsTo(Subcategory::class);
    }

    public function brand()
    {
    	return $this->belongsTo(Brand::class);
    }

    public function stocks()
    {
      return $this->hasMany(Stock::class, 'product_id');
    }
}
