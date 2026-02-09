<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
  protected $fillable = [
    'name',
    'phone',
    'owner',
    'contact_person',
    'contact',
    'domain',
    'address',
    'email',
    'password',
    'status',
    'created_by'
  ];

}
