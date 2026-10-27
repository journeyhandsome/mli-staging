<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameSupportingDocumentITwentyFormTable extends Migration
{
    public function up()
    {
            Schema::table('l_twenty_forms', function (Blueprint $table) {
                $table->dropColumn('supportingDocument');
            });
    }
    public function down()
    {
            Schema::table('l_twenty_forms', function (Blueprint $table) {
                $table->string('supportingDocument');
            });
    }
}
