<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'item_id',
        'quantity',
        'item_name',
        'price',
        'tax',
        'image',
        'comment',
    ];

    public function orderitems()
    {
        return $this->belongsTo(OrderItem::class);
    }
}
