<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchPerformance extends Model
{
    protected $table = 'tblMatchPerformance'; // Specify the custom table name

    protected $fillable = [
        'username',
        'rounds',
        'kills',
        'deaths',
        'assists',
        'headshots',
        'headshotPercentage',
        'oneVX',
        'KOSTRounds',
        'survived',
        'entryKill',
        'entryDeath',
        'defuserPlantComplete',
        'defuserDestroyedComplete',
        'teamID',
        'profileID',
        'tournamentMatchID',
        'ubisoftMatchID'
    ];
}