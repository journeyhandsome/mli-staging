<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BrochuresAddColumnIspromo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('download_brochures', function (Blueprint $table) {
            $table->boolean('is_promo')->default(false)->after('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('download_brochures', function (Blueprint $table) {
            $table->dropColumn('is_promo');
        });
    }
}
