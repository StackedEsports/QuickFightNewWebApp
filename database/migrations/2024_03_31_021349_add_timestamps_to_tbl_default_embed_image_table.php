<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToTblDefaultEmbedImageTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tblDefaultEmbedImage', function (Blueprint $table) {
            // Add the timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tblDefaultEmbedImage', function (Blueprint $table) {
            // Remove the timestamps
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }
}