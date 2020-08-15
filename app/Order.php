<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'store_id',
        'order_status',
        'recieved_date',
        'recieved_time',
        'order_total_price',
        'comment',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
