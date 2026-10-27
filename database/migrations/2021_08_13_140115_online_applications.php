<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OnlineApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('birthday');
            $table->string('gender')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('nationality');
            $table->string('country');
            $table->string('student_visa_application');
            $table->string('campus');
            $table->string('accommodation_arrangements');
            $table->string('promo_code')->nullable();
            $table->string('message')->nullable();
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
        Schema::dropIfExists('online_applications');
    }
}
