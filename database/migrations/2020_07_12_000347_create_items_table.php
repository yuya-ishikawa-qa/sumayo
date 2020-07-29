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
            $table->bigIncrements('id');
            $table->string('item_name',128);
            $table->text('description');
            $table->boolean('is_selling');
            $table->tinyInteger('item_category_id');
            $table->unsignedMediumInteger('price')->default(0);
            $table->unsignedTinyInteger('tax')->default(10);
            $table->unsignedTinyInteger('stock_sunday')->default(0);
            $table->unsignedTinyInteger('stock_monday')->default(0);
            $table->unsignedTinyInteger('stock_tuesday')->default(0);
            $table->unsignedTinyInteger('stock_wednesday')->default(0);
            $table->unsignedTinyInteger('stock_thursday')->default(0);
            $table->unsignedTinyInteger('stock_friday')->default(0);
            $table->unsignedTinyInteger('stock_saturday')->default(0);
            $table->string('path');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
