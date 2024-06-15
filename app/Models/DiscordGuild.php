<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscordGuild extends Model
{
    protected $table = 'tblDiscordGuild'; // Keep the original table name here
    protected $primaryKey = 'DiscordGuildId';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'ToornamentTournamentId',
        'MatchesGroupId',
        'StreamAnnouncementChannel',
        'TeamCaptainRoleId',
        'TeamCategoryId',
        'AdminRoleId',
        'StreamNotificationRole',
        'CorePlayerRole',
        'ActiveMatchId',
    ];
}