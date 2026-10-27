<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_payment', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('fname');
            $table->string('lname');
            $table->string('amount');
            $table->string('payment_details');
            $table->string('payment_others')->nullable();
            $table->string('language', 5)->default('en');
            $table->string('stripe_key', 10);
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
        Schema::dropIfExists('add_payment');
    }
}
