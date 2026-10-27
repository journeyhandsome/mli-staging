<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdjustMessageSize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function ($table) {
            $table->string('email', 50)->change();
            $table->string('phone', 20)->change();
            $table->string('country', 56)->change();
            $table->string('campus', 15)->change();
            $table->string('time_to_start', 50)->change();
            $table->string('media', 20)->change();
            $table->string('message', 500)->change();
        });
        Schema::table('download_brochures', function ($table) {
            $table->string('email', 50)->change();
            $table->string('phone', 20)->change();
            $table->string('country', 56)->change();
            $table->string('campus', 15)->change();
            $table->string('time_to_start', 50)->change();
            $table->string('media', 20)->change();
            $table->string('message', 500)->change();
        });
        Schema::table('free_trials', function ($table) {
            $table->string('email', 50)->change();
            $table->string('phone', 20)->change();
            $table->string('nationality', 56)->change();
            $table->string('campus', 15)->change();
            $table->string('date_schedule', 50)->change();
            $table->string('time_schedule', 50)->change();
            $table->string('message', 500)->change();
        });
        Schema::table('online_applications', function ($table) {
            $table->string('birthday', 10)->change();
            $table->string('gender', 10)->change();
            $table->string('phone', 20)->change();
            $table->string('email', 50)->change();
            $table->string('nationality', 56)->change();
            $table->string('country', 56)->change();
            $table->string('student_visa_application', 15)->change();
            $table->string('campus', 15)->change();
            $table->string('accommodation_arrangements', 50)->change();
            $table->string('promo_code', 20)->change();
            $table->string('message', 500)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function ($table) {
            $table->string('email', 191)->change();
            $table->string('phone', 191)->change();
            $table->string('country', 191)->change();
            $table->string('campus', 191)->change();
            $table->string('time_to_start', 191)->change();
            $table->string('media', 191)->change();
            $table->string('message', 191)->change();
        });
        Schema::table('download_brochures', function ($table) {
            $table->string('email', 191)->change();
            $table->string('phone', 191)->change();
            $table->string('country', 191)->change();
            $table->string('campus', 191)->change();
            $table->string('time_to_start', 191)->change();
            $table->string('media', 191)->change();
            $table->string('message', 191)->change();
        });
        Schema::table('free_trials', function ($table) {
            $table->string('email', 191)->change();
            $table->string('phone', 191)->change();
            $table->string('nationality', 191)->change();
            $table->string('campus', 191)->change();
            $table->string('date_schedule', 191)->change();
            $table->string('time_schedule', 191)->change();
            $table->string('message', 191)->change();
        });
        Schema::table('online_applications', function ($table) {
            $table->string('birthday', 191)->change();
            $table->string('gender', 191)->change();
            $table->string('phone', 191)->change();
            $table->string('email', 191)->change();
            $table->string('nationality', 191)->change();
            $table->string('country', 191)->change();
            $table->string('student_visa_application', 191)->change();
            $table->string('campus', 191)->change();
            $table->string('accommodation_arrangements', 191)->change();
            $table->string('promo_code', 191)->change();
            $table->string('message', 191)->change();
        });
    }
}
