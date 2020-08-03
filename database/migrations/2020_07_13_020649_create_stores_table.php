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
            $table->string('name');
            $table->string('phone');
            $table->string('postcode');
            $table->string('address');
            $table->text('comment');

            $table->integer('earliest_receivable_time');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('serve_range_time');
            $table->integer('capacity');

            $table->string('logo')->nullable();
            $table->string('top_image1')->nullable();
            $table->string('top_image2')->nullable();
            $table->string('top_image3')->nullable();

            # 店舗画像関係は今後必須だが、画像追加機能を作成するまでは一旦nullable()で実装。

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
