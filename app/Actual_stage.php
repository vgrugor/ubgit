<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actual_stage extends Model
{
    protected $fillable = ['name'];

    public static function getCompleteInformationAboutActualStages()
    {
        $actualStagesInfo = self::select('id', 'name')->get();

        return $actualStagesInfo;
    }
}
