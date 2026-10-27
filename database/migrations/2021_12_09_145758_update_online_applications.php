<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOnlineApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('online_applications', function (Blueprint $table) {
            $table->string('fname', 50)->after('id');
            $table->string('mname', 50)->default(' ')->after('fname');
            $table->string('lname', 50)->after('mname');
            $table->string('lesson_start_date', 50)->after('accommodation_arrangements');
            $table->string('language', 5)->default('en')->after('message');
            $table->boolean('is_sent')->default(false)->after('message');
            $table->string('stripe_key', 10)->after('is_sent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('online_applications', function (Blueprint $table) {
            $table->dropColumn('fname');
            $table->dropColumn('mname');
            $table->dropColumn('lname');
            $table->dropColumn('lesson_start_date');
            $table->dropColumn('language');
            $table->dropColumn('is_sent');
            $table->dropColumn('stripe_key');
        });
    }
}
