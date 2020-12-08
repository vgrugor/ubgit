<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video_surveillance extends Model
{
    protected $fillable = ['point_id', 'video_surveillance_status_id', 'date_installation', 'date_demount', 'note'];
}
