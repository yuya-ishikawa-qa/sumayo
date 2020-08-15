<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'order_id',
        'last_name',
        'first_name',
        'last_name_kana',
        'first_name_kana',
        'mail',
        'tel',
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
