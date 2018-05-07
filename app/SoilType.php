<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoilType extends Model
{
    protected $fillable = [
        'soilType', 'comments', 'systemID'
    ];
}