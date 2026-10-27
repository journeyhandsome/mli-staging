<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLTwentyFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_twenty_forms', function (Blueprint $table) {
            $table->id();
            $table->string("appliedProgram")->nullable();
            $table->string("courseDuration")->nullable();
            $table->string("deliveryMode")->nullable();
            $table->json("supportingDocument")->nullable();
            $table->string("street_name")->nullable();
            $table->string("address_no")->nullable();
            $table->string("city")->nullable();
            $table->string("country")->nullable();
            $table->string("state")->nullable();
            $table->string("tel")->nullable();
            $table->string("email")->nullable();
            $table->string("campus")->nullable();
            $table->string("studentType")->nullable();
            $table->string("programStartDate")->nullable();
            $table->string("fname")->nullable();
            $table->string("lname")->nullable();
            $table->string("countryBirth")->nullable();
            $table->string("birthday")->nullable();
            $table->string("citizenshipCountry")->nullable();
            $table->string("gender")->nullable();
            $table->string("birthCity")->nullable();
            $table->string("services")->nullable();
            $table->double("fee")->nullable();
            $table->string("fee_currency")->nullable();
            $table->boolean('is_sent')->default(false);
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
        Schema::dropIfExists('l_twenty_forms');
    }
}
