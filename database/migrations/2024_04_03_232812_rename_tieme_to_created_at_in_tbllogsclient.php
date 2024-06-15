<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTiemeToCreatedAtInTbllogsclient extends Migration
{
    public function up()
    {
        Schema::table('tbllogsclient', function (Blueprint $table) {
            $table->renameColumn('tieme', 'created_at');
        });
    }

    public function down()
    {
        Schema::table('tbllogsclient', function (Blueprint $table) {
            $table->renameColumn('created_at', 'tieme');
        });
    }
}