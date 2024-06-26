<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToTblMapBanActionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tblMapBanAction', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tblMapBanAction', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }
}