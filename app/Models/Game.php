<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'tblGame'; // Specify the table name here
    protected $primaryKey = 'gameId'; // Primary key column

    // Assuming you want to allow mass assignment for 'gameName'
    protected $fillable = ['gameName'];
}