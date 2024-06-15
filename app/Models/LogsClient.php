<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogsClient extends Model
{
    protected $table = 'tbllogsclient'; // Custom table name

    protected $fillable = [
        'status', 'type', 'title', 'clientUsername', 'clientId', 'location', 'data'
        // Assuming 'tieme' is handled separately or will be renamed
    ];
}