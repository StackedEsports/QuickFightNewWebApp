<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchViewerRole extends Model
{
    protected $table = 'tblMatchViewerRole'; // Specify the custom table name
    public $incrementing = false; // Since there's no auto-incrementing ID

    protected $fillable = ['DiscordGuildId', 'GuildRoleId'];

    // Assuming you have a DiscordGuild model for the tblDiscordGuild table
    public function discordGuild()
    {
        return $this->belongsTo(DiscordGuild::class, 'DiscordGuildId', 'DiscordGuildId');
    }
}