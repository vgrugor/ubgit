<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Drill extends Model
{
    public function getDateBuildingAttribute($date)
    {
        return $this->convertDateToString($date);
    }
    
    public function getDateDrillingAttribute($date)
    {
        return $this->convertDateToString($date);
    }
    
    public function getDateDemountAttribute($date)
    {
        return $this->convertDateToString($date);
    }
    
    public function getDateTransferAttribute($date)
    {
        return $this->convertDateToString($date);
    }
    
    public function getDateRefreshAttribute($date)
    {
        return $this->convertDateToString($date);
    }
    
    public function getDateActualStageRefreshAttribute($date)
    {
       return $this->convertDateToString($date);
    }
    
    private function convertDateToString($date)
    {
        if ($date != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $date)->format('d.m.Y');
        }
        return '-';
    }
}
