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
            $table->text('description')->nullable();
            $table->boolean('is_selling')->default(0);
            $table->tinyInteger('item_category_id')->default(0);
            $table->unsignedMediumInteger('price')->default(0);
            $table->unsignedTinyInteger('tax')->default(10);
            $table->unsignedTinyInteger('stock_all')->default(0);
            $table->unsignedTinyInteger('stock_sunday')->default(0);
            $table->unsignedTinyInteger('stock_monday')->default(0);
            $table->unsignedTinyInteger('stock_tuesday')->default(0);
            $table->unsignedTinyInteger('stock_wednesday')->default(0);
            $table->unsignedTinyInteger('stock_thursday')->default(0);
            $table->unsignedTinyInteger('stock_friday')->default(0);
            $table->unsignedTinyInteger('stock_saturday')->default(0);
            $table->string('path')->nullable();
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
