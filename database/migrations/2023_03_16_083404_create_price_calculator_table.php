<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceCalculatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_calculator', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('email');
            $table->string('country');
            $table->string('tel');
            $table->boolean('phone_call');
            $table->string('campus');
            $table->string('media');
            $table->string('time_to_start');
            $table->string('message')->nullable();
            $table->string('utm_source', 50);
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
        Schema::dropIfExists('price_calculator');
    }
}
