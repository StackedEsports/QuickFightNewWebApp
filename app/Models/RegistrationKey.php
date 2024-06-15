<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationKey extends Model
{
    protected $table = 'tblRegistrationKey'; // Custom table name
    protected $primaryKey = 'KeyId'; // Custom primary key



    protected $fillable = [
        'KeyValue', 'KeyUsed', 'UsedByDiscordUserId', 'UsedAt', 'TeamCreatedAt', 'AssociatedTournament'
    ];
}