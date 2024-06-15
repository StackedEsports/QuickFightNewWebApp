<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToTblStreamedMatch extends Migration
{
    public function up()
    {
        Schema::table('tblStreamedMatch', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('tblStreamedMatch', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }
}