<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StreamedMatch extends Model
{
    protected $table = 'tblStreamedMatch'; // Custom table name
    public $incrementing = false; // Since the primary key is not auto-incrementing
    protected $primaryKey = 'ToornamentMatchId'; // Custom primary key

    protected $fillable = [
        'ToornamentMatchId', 'AverageViewers'
    ];
}