<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToTblProtestUpdate extends Migration
{
    public function up()
    {
        Schema::table('tblProtestUpdate', function (Blueprint $table) {
            // Since there's already an UpdateTime column, we only add created_at
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tblProtestUpdate', function (Blueprint $table) {
            $table->dropColumn(['created_at']);
        });
    }
}