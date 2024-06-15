<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchChannel extends Model
{
    protected $table = 'tblMatchChannel'; // Specify the custom table name
    protected $primaryKey = 'DiscordChannelId'; // Primary key column
    public $incrementing = false; // Set to false because primary key is not an integer

    protected $fillable = ['DiscordChannelId', 'ToornamentMatchId', 'ChatArchive'];
}