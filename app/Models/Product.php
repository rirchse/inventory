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
    	return $this->hasOne('App\Category');
    }

    public function subcategory()
    {
    	return $this->hasOne('App\Subcategory');
    }

    public function vendors()
    {
    	return $this->hasOne('App\Vendor');
    }

    public function stocks()
    {
      return $this->hasMany(Stock::class, 'product_id');
    }
}
