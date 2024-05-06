<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer

extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];



    function givenReview($id)
    {
        return $this->hasMany(Review::class, 'customer_id')->where('customer_id', auth('customer')->id())->where('food_id', $id)->exists();
    }
}
