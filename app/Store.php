<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [

        'name',
        'phone',
        'postcode',
        'address',
        'comment',
        'start_time',
        'end_time',
        'earliest_receivable_time',
        'serve_range_time',
        'capacity',
        'logo',
        'top_image1',
        'top_image2',
        'top_image3',
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
