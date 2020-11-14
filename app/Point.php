<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = [
        'name',
        'drill_id',
        'is_actual',
        'nld',
        'nlm',
        'nls',
        'eld',
        'elm',
        'els',
        'coordinate_stage',
        'address',
        'date_building',
        'date_drilling',
        'date_demount',
        'date_transfer',
        'date_refresh',
        'actual_stage_id',
        'date_actual_stage_refresh',
        'note'
    ];
}
