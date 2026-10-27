<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUtmSourceToAllForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_forms', function (Blueprint $table) {
            Schema::table('contacts', function ($table) {
                $table->string('utm_source', 50)->after('is_promo')->default('direct');
            });
            Schema::table('download_brochures', function ($table) {
                $table->string('utm_source', 50)->after('is_promo')->default('direct');
            });
            Schema::table('free_trials', function ($table) {
                $table->string('utm_source', 50)->after('message')->default('direct');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all_forms', function (Blueprint $table) {
            Schema::table('contacts', function ($table) {
                $table->dropColumn('utm_source');
            });
            Schema::table('download_brochures', function ($table) {
                $table->dropColumn('utm_source');
            });
            Schema::table('free_trials', function ($table) {
                $table->dropColumn('utm_source');
            });
        });
    }
}
