<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Protest extends Model
{
    protected $table = 'tblProtest'; // Specify the custom table name

    protected $fillable = [
        'DiscordGuildId', 'DiscordChannelId', 'MessageID', 'OpenedBy', 
        'Reason', 'admin_in_charge', 'status'
    ];
}