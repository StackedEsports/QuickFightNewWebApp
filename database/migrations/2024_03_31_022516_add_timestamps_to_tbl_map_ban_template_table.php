<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToTblMapBanTemplateTable extends Migration
{
    public function up()
    {
        Schema::table('tblMapBanTemplate', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('tblMapBanTemplate', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }
}