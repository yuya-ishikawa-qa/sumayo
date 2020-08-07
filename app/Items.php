<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $fillable = ['item_name','description','is_selling','item_category_id','price','tax','stock_sunday','stock_monday','stock_tuesday','stock_wednesday','stock_thursday','stock_friday','stock_saturday','path'];
    
}
