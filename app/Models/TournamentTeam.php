<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TournamentTeam extends Model
{
    protected $table = 'tblTournamentTeam'; // Custom table name
    protected $primaryKey = 'teamId'; // Primary key

    protected $fillable = [
        'toornamentTeamId', 'toornamentTournamentId', 'discordTeamRoleId', 'discordTeamChannelId', 'discordTeamVoiceChannelId', 'teamLogo'
    ];
}