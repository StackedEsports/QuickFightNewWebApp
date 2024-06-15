<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToTblMapBanTemplateMappoolTable extends Migration
{
    public function up()
    {
        Schema::table('tblMapBanTemplateMappool', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('tblMapBanTemplateMappool', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }
}