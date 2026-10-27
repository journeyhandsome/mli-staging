<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFinancialToLTwentyFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('l_twenty_forms', function (Blueprint $table) {
            $table->json('financial')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('l_twenty_forms', function (Blueprint $table) {
            $table->dropColumn('financial');
        });
    }
}
