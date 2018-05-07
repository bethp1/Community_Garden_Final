<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planter extends Model
{
    protected $fillable = [
        'PlanterType', 'comments','systemID'
    ];
}
