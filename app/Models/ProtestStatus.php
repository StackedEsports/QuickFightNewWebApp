<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProtestStatus extends Model
{
    protected $table = 'tblProtestStatus'; // Specify the custom table name

    protected $primaryKey = 'StatusId'; // Specify the primary key if it's not 'id'

    public $incrementing = true; // Set to false if your primary key is not auto-incrementing


    protected $fillable = [
        'StatusId', 'StatusName'
    ];

    // If you prefer to use guarded instead of fillable, you can comment out the fillable line and use:
    // protected $guarded = [];
}