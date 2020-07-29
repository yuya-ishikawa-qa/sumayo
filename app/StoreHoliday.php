<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreHoliday extends Model
{
    protected $fillable = [
        'holiday',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
