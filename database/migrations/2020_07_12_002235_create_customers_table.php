<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->string('last_name',60);
            $table->string('first_name',60);
            $table->string('last_name_kana',60);
            $table->string('first_name_kana',60);
            $table->string('mail',120);
            $table->string('tel',15);
            $table->timestamps();
            //$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            //$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
