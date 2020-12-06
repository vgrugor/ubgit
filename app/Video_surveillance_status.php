<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video_surveillance_status extends Model
{
    protected $fillable = ['name', 'order_by'];
    
    
    public static function getVideoSurveillanceStatusesList()
    {
        $videoSurveillanceStatusesList = self::select('id', 'name', 'order_by')->orderBy('order_by', 'asc')->get();
        
        return $videoSurveillanceStatusesList;
    }
    
    public static function getVideoSurveillanceStatus($id)
    {
        $videoSurveillanceStatus = self::find($id);
        
        return $videoSurveillanceStatus;
    }
}
