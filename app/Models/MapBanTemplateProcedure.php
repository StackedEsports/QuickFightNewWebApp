<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapBanTemplateProcedure extends Model
{
    protected $table = 'tblMapBanTemplateProcedure'; // Specify the custom table name
    protected $primaryKey = 'stepId'; // Primary key column

    protected $fillable = ['templateId', 'procedureStep', 'actionId', 'actionOn', 'actionBy'];

    // Define relationships if necessary, for example:
    public function template()
    {
        return $this->belongsTo(MapBanTemplate::class, 'templateId', 'templateId');
    }

    public function action()
    {
        return $this->belongsTo(MapBanAction::class, 'actionId', 'actionId');
    }
}