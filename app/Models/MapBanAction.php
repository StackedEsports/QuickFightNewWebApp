<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapBanAction extends Model
{
    protected $table = 'tblMapBanAction'; // Specify the custom table name
    protected $primaryKey = 'actionId'; // Primary key column

    // Assuming you want to allow mass assignment for 'actionName' and 'actionPastTense'
    protected $fillable = ['actionName', 'actionPastTense'];
}