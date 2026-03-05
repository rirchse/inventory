<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'contact',
        'email',
        'address',
        'business_name',
        'details',
        'status',
        'shop_id',
        'created_by',
        'updated_by'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
