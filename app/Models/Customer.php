<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = [
    'shop_id',
    'name',
    'email',
    'password',
    'contact',
    'care_of',
    'phone',
    'dob',
    'gender',
    'job',
    'organization',
    'present_address',
    'address',
    'post_code',
    'city',
    'state',
    'zip_code',
    'country',
    'image',
    'status',
    'created_by',
  ];

  public function sale()
  {
    return $this->hasOne(Sale::class, 'customer_id');
  }
}
