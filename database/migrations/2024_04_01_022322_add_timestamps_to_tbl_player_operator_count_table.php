<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToTblPlayerOperatorCountTable extends Migration
{
    public function up()
    {
        Schema::table('tblPlayerOperatorCount', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('tblPlayerOperatorCount', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }
}