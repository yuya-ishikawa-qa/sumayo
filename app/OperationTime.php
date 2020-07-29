<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationTime extends Model
{
    protected $fillable = [
        'start_time',
        'end_time',
        'serve_range_time',
        'capacity',
    ];

}
