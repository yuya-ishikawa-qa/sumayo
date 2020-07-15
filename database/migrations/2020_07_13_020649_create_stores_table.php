<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {

            $table->increments('id');
            $table->string('store_name');
            $table->string('store_phone');
            $table->string('store_postcode');
            $table->string('store_address');
            $table->text('store_comment');

            $table->integer('earliest_receivable_time');

            $table->string('store_logo');
            $table->string('store_image1');
            $table->string('store_image2');
            $table->string('store_image3');

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
        Schema::dropIfExists('stores');
    }
}
