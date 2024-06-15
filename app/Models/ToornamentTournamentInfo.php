<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToornamentTournamentInfo extends Model
{
    protected $table = 'tblToornamentTournamentInfo'; // Custom table name
    public $incrementing = false; // Since the primary key is not auto-incrementing
    protected $primaryKey = 'ToornamentTournamentID'; // Custom primary key

    protected $fillable = [
        'ToornamentTournamentID', 'RostersLocked', 'CorePlayersSystemsUsed', 'NewMatchText', 'mapBanTemplateUsed', 'ChatRestrictedToCaptains', 'CreateTeamVC'
    ];
}