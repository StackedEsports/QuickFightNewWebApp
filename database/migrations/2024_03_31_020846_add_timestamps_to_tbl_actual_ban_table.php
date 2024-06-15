<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToTblActualBanTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tblActualBan', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tblActualBan', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }
}