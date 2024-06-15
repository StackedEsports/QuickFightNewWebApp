<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapBanSession extends Model
{
    protected $table = 'tblMapBanSession'; // Specify the custom table name
    protected $primaryKey = 'sessionId'; // Primary key column

    // Assuming you want to allow mass assignment for 'templateId', 'discordChannelId', and 'discordMessageId'
    protected $fillable = ['templateId', 'discordChannelId', 'discordMessageId'];

    /**
     * The map ban template that the session belongs to.
     */
    public function template()
    {
        return $this->belongsTo(MapBanTemplate::class, 'templateId', 'templateId');
    }
}