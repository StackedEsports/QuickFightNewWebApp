<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActualBan extends Model
{
    protected $table = 'tblActualBan'; // Keep the original table name here
    protected $primaryKey = 'actualBanId';

    // Specify either fillable or guarded properties
    protected $fillable = [
        'stepId',
        'pickedByUserId',
        'pickedForRole',
        'pickedChoice',
        'sessionId',
    ];

    // Define the relationship with the tblMapBanTemplateProcedure table
    public function mapBanTemplateProcedure()
    {
        return $this->belongsTo(MapBanTemplateProcedure::class, 'stepId', 'stepId');
    }

    // Define the relationship with the tblMapBanSession table
    public function mapBanSession()
    {
        return $this->belongsTo(MapBanSession::class, 'sessionId', 'sessionId');
    }
}
