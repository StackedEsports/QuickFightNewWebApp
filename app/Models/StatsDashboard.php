<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatsDashboard extends Model
{
    protected $table = 'tblStatsDashboard'; // Custom table name
    protected $primaryKey = 'PlayerTag'; // Custom primary key



    protected $fillable = [
        'PlayerTag', 'TeamId', 'PlayerUplay', 'PlayerVisible', 'PlayerUplayLogo'
    ];
}