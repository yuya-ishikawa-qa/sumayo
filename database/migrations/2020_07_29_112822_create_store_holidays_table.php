<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_holidays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('store_id')->references('id')->on('stores');
            $table->string('date', 8)->unique();
            $table->integer('is_holiday')->default(0);
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
        Schema::dropIfExists('store_holidays');
    }
}
