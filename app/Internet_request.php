<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internet_request extends Model
{
    protected $fillable = [
        'point_id',
        'internet_provider_id',
        'internet_request_type_id',
        'date_send',
        'date_request',
        'is_completed',
        'date_completion',
        'note'
    ];
}
