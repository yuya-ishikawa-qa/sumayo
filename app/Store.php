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
        'earliest_receivable_time',
        'store_logo',
        'store_image1',
        'store_image2',
        'store_image3',
        
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function storeHolidays()
    {
        return $this->hasMany(StoreHoliday::class);
    }

}
