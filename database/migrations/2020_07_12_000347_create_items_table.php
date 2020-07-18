<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // ?$table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            // $table->tinyInteger('itemcategories');
            // $table->string('item_name',128);
            // $table->bigIncrements('itemcategories');
            // $table->bigIncrements('itemcategories');


// store_id
// itemcategoriies
// item_name
// is_selling
// itemcategory_id
// stock_sunday
// stock_monday
// stock_tuesday
// stock_wednesday
// stock_thursday
// stock_friday
// stock_saturday
// price
// tax
// image
// updated_at
// created_at






            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
