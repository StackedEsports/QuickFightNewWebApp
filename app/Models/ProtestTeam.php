<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProtestTeam extends Model
{
    protected $table = 'tblProtestTeam'; // Specify the custom table name

    public $incrementing = false; // Set to false because your primary key is not auto-incrementing
    protected $primaryKey = 'TeamId'; // Specify the primary key if it's not 'id'

    protected $fillable = [
        'TeamId', 'ProtestId'
    ];

    // Define the relationship with the Protest model
    public function protest()
    {
        return $this->belongsTo(Protest::class, 'ProtestId', 'ProtestId');
    }
}