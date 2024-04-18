<?php

namespace App\Models;

use App\Models\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;


    function orderItems()
    {
        return $this->hasMany(OrderItem::class)->with('food');
    }
    // function customer() {
    //     return $this->belongsTo(Customer::class);
    // }
    function table()
    {
        return $this->belongsTo(Table::class);
    }
}
