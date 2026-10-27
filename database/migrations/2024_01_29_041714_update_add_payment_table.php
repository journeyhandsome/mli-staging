<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAddPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::table('add_payment', function (Blueprint $table) {
            $table->string('campus', 60)->after('date');
            $table->boolean('is_sent')->after('stripe_key')->default(false);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::table('add_payment', function (Blueprint $table) {
        $table->dropColumn('campus');
        $table->dropColumn('is_sent');
    });
    }
}
