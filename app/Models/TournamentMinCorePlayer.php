<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TournamentMinCorePlayer extends Model
{
    protected $table = 'tblTournamentMinCorePlayers'; // Custom table name
    public $incrementing = false; // Since the primary key is not auto-incrementing
    protected $primaryKey = 'ToornamentTournamentID'; // Custom primary key

    protected $fillable = [
        'ToornamentTournamentID', 'MinCorePlayers'
    ];
}