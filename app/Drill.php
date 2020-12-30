<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use App\Drill_type;
use App\Point;

class Drill extends Model
{
    protected $fillable = [
        'name',
        'germany_name',
        'drill_type_id',
        'workers_transfer',
        'phone_number',
        'email',
        'note'
    ];

    public static function getCompleteInformationAboutDrills()
    {
        $drillsInfo = self::leftJoin('drill_types', 'drills.drill_type_id', '=', 'drill_types.id')
                ->leftJoin('points', 'points.id', '=', 'drills.workers_transfer')
                ->select('drills.id',
                        'drills.name as drill',
                        'points.name as point',
                        'points.id as point_id',
                        'drills.note as note',
                        'drill_types.name as type')
                ->get();

        return $drillsInfo;
    }
}
