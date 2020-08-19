<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreHoliday extends Model
{
    protected $fillable = [
        'store_id',
        'date',
        'is_holiday',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
