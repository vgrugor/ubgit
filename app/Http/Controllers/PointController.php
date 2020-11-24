<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Point;

class PointController extends Controller
{
    public function pointsList()
    {
      $points = Point::leftJoin('drills', 'drills.id', '=', 'points.drill_id')
              ->leftJoin('drill_types', 'drill_types.id', '=', 'drills.drill_type_id')
              ->leftJoin('actual_stages', 'actual_stages.id', '=', 'points.actual_stage_id')
              ->select(['points.id as id',
                      'points.name as point',
                      'points.note as note',
                      'drills.name as drill',
                      'drills.germany_name as germany_name',
                      'drill_types.name as type',
                      'actual_stages.name as actual_stage'
                  ])
              ->where('points.is_actual', 1)
              ->orderBy('points.drill_id', 'asc')
              ->orderBy('points.created_at', 'desc')
              ->get();

        return view('point.pointslist')->with(['pointsList' => $points ]);
    }

    public function view($id)
    {
        $point = Point::leftJoin('actual_stages', 'actual_stages.id', '=', 'points.actual_stage_id')
            ->select(['points.id as id',
                'points.name as point',
                'is_actual', 'nld', 'nlm', 'nls',
                'eld', 'elm', 'els',
                'coordinate_stage', 'address',
                'date_building', 'date_drilling', 'date_demount', 'date_transfer', 'date_refresh',
                'actual_stages.name as actual_stage',
                'date_actual_stage_refresh', 'points.note as note'])
            ->find($id);

        return view('point.view')->with([
            'point' => $point
        ]);
    }
}
