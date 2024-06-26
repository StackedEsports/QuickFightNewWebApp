<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToTblTournamentMinCorePlayers extends Migration
{
    public function up()
    {
        Schema::table('tblTournamentMinCorePlayers', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('tblTournamentMinCorePlayers', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }
}