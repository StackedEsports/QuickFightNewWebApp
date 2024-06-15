<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefaultEmbedImage extends Model
{
    protected $table = 'tblDefaultEmbedImage'; // Keep the original table name here
    protected $primaryKey = 'defaultImageId';
    

    // Since 'url' and 'name' are unique, you might want to perform unique checks before inserts or updates.
    // Laravel doesn't automatically enforce unique constraints at the model level, so you'll need to handle that in your application logic.

    // Specify either fillable or guarded properties
    protected $fillable = [
        'url',
        'name',
    ];

    // Alternatively, if you want to guard against mass assignment but don't want to specify each fillable field, you could use:
    // protected $guarded = ['defaultImageId'];
}