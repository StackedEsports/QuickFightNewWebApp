<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerOperatorCount extends Model
{
    protected $table = 'tblPlayerOperatorCount'; // Specify the custom table name

    protected $fillable = [
        'playerId',
        'operatorName',
        'operatorRole',
        'tournamentTeamId',
        'ubisoftMatchId',
        'tournamentMatchId',
        'operatorPickCount'
    ];
}