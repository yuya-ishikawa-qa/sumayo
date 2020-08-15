<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [

        'store_name',
        'store_phone',
        'store_postcode',
        'store_address',
        'store_comment',
        'start_time',
        'end_time',
        'earliest_receivable_time',
        'serve_range_time',
        'capacity',
        'store_logo',
        'store_image1',
        'store_image2',
        'store_image3',
    ];

    // Store Model : User Mode = 1 対 多 を定義
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Store Model : StoreHoliday Model = 1 対 多 を定義
    public function storeHolidays()
    {
        return $this->hasMany(StoreHoliday::class);
    }

}
