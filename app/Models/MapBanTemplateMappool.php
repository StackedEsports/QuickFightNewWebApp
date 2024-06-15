<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapBanTemplateMappool extends Model
{
    protected $table = 'tblMapBanTemplateMappool'; // Specify the custom table name

    protected $fillable = ['mapBanTemplateId', 'mapId'];

    public function template()
    {
        return $this->belongsTo(MapBanTemplate::class, 'mapBanTemplateId', 'templateId');
    }

    public function map()
    {
        return $this->belongsTo(Map::class, 'mapId', 'mapId');
    }
}