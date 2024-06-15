<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapBanTemplate extends Model
{
    protected $table = 'tblMapBanTemplate'; // Specify the custom table name
    protected $primaryKey = 'templateId'; // Primary key column

    protected $fillable = ['templateName'];
}