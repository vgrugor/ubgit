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
        'gps',
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
    
    /**
     * Получить указзаные gps-координаты или рассчитать их по географическим
     * @param type $id
     * @return string
     */
    public static function getGpsCoordinate($id)
    {
        $gps = Point::find($id)->gps;
        
        if ($gps) {
            return $gps;
        }
        return Point::calculateGpsCoordinate($id);
    }
    
    /**
     * Рассчитать gps-координаты по географическим координатам
     * @param type $id
     * @return string
     */
    public static function calculateGpsCoordinate($id)
    {
        $point = Point::find($id);
        
        if ( ($point->nld > 0) && ($point->eld > 0) ) {
            $nl = $point->nld + ($point->nlm / 60) + ($point->nls / 3600);
            $el = $point->eld + ($point->elm / 60) + ($point->els / 3600);
            
            $nl = round($nl, 6);
            $el = round($el, 6);
            
            $gps = sprintf("%01.6f", $nl) . ', ' . sprintf("%01.6f", $el);
            
            return $gps;
        }
    }
    
    /**
     * Получить указзаные географические координаты или рассчитать их по gps
     * @param type $id
     * @return array
     */
    public static function getGeoCoordinate($id)
    {
        $point = Point::find($id);
        
        if ( ($point->nld > 0) || ($point->nlm > 0) || ($point->nls > 0) || ($point->eld > 0) || ($point->elm > 0) || ($point->els > 0) ) {
            
            return [
                'nld' => $point->nld,
                'nlm' => $point->nlm,
                'nls' => $point->nls,
                'eld' => $point->eld,
                'elm' => $point->elm,
                'els' => $point->els,
            ];
        }
        
        return Point::calculateGeoCoordinate($id);
    }
    
    /**
     * Расчет географических координат по gps-координатам
     * @param type $id
     * @return array
     */
    public static function calculateGeoCoordinate($id)
    {
        $point = Point::find($id);
        
        if($point->gps) {
            list($nGps, $eGps) = explode(',', $point->gps);
            
            $nGps = (float) $nGps;
            $eGps = (float) $eGps;
            
            $nld = floor($nGps);
            $nlm = floor(($nGps - $nld) * 60);
            $nls = round((($nGps - $nld - ($nlm / 60)) * 3600), 1);
            
            $eld = floor($eGps);
            $elm = floor(($eGps - $eld) * 60);
            $els = round((($eGps - $eld - ($elm / 60)) * 3600), 1);
            
            return [
                'nld' => $nld,
                'nlm' => $nlm,
                'nls' => $nls,
                'eld' => $eld,
                'elm' => $elm,
                'els' => $els,
            ];
        }
    }
}
