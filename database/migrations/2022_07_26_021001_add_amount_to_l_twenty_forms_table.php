<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAmountToLTwentyFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('l_twenty_forms', function (Blueprint $table) {
            $table->float("account_balance")->nullable()->after('financial');
            $table->string("account_type")->nullable()->after('account_balance');
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
            $table->dropColumn('account_balance');
            $table->dropColumn('account_type');
        });
    }
}
