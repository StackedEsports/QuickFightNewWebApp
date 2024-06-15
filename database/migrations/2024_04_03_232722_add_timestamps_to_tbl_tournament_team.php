<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToTblTournamentTeam extends Migration
{
    public function up()
    {
        Schema::table('tblTournamentTeam', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('tblTournamentTeam', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }
}