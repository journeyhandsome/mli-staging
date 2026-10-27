<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMessageColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function ($table) {
            $table->string('message', 1000)->change();
        });

        Schema::table('download_brochures', function ($table) {
            $table->string('message', 1000)->change();
        });

        Schema::table('free_trials', function ($table) {
            $table->string('message', 1000)->change();
        });

        Schema::table('online_applications', function ($table) {
            $table->string('message', 1000)->change();
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
            $table->string('message', 500)->change();
        });

        Schema::table('download_brochures', function ($table) {
            $table->string('message', 500)->change();
        });

        Schema::table('free_trials', function ($table) {
            $table->string('message', 500)->change();
        });

        Schema::table('online_applications', function ($table) {
            $table->string('message', 500)->change();
        });
    }
}
