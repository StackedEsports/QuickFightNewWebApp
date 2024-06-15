<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProtestUpdate extends Model
{
    protected $table = 'tblProtestUpdate'; // Custom table name


    protected $fillable = [
        'ProtestId', 'CurrentStatusId', 'AdminInCharge', 'UpdateTime'
    ];

    // Define relationships if necessary
}