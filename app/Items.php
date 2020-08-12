<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model
{
    // 論理削除用
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    
    protected $fillable = ['item_name','description','is_selling','item_category_id','price','tax','stock_sunday','stock_monday','stock_tuesday','stock_wednesday','stock_thursday','stock_friday','stock_saturday','path'];
    
}
