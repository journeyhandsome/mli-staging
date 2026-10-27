<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToLTwentyFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('l_twenty_forms', function (Blueprint $table) {
            $table->string('zip')->after('state')->nullable();
            $table->json('visa')->after('financial')->nullable();
            $table->json('i94')->after('visa')->nullable();
            $table->json('transfer_form')->after('i94')->nullable();
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
            $table->dropColumn('zip');
            $table->dropColumn('visa');
            $table->dropColumn('i94');
            $table->dropColumn('transfer_form');
        });
    }
}
