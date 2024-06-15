<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $table = 'tblMap'; // Specify the custom table name
    protected $primaryKey = 'mapId'; // Primary key column

    // Assuming you want to allow mass assignment for 'gameId' and 'mapName'
    protected $fillable = ['gameId', 'mapName'];

    /**
     * The game that the map belongs to.
     */
    public function game()
    {
        return $this->belongsTo(Game::class, 'gameId', 'gameId');
    }
}