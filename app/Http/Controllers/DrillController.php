<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Drill;
use App\Point;
use App\Worker;

class DrillController extends Controller
{
    public function drillsList() {

    $drills = Drill::leftJoin('drill_types', 'drills.drill_type_id', '=', 'drill_types.id')
            ->leftJoin('points', 'points.id', '=', 'drills.workers_transfer')
            ->select('drills.id',
                    'drills.name as drill',
                    'points.id as point_id',
                    'points.name as point',
                    'drills.note as note',
                    'drill_types.name as type')
            ->get();

        return view('drill.drillslist')->with(['drillsList' => $drills]);
    }


    public function internet() {

        return view('drill.internet');
    }


    public function carpet() {

        $drillsList = Drill::leftJoin('actual_stages', 'drills.actual_stage_id','=', 'actual_stages.id')
                ->select('drills.name as drill', 'date_building', 'date_drilling',
                'date_demount', 'date_transfer', 'date_refresh', 'actual_stages.name as actual_stage')
                ->get();

        return view('drill.carpet')->with('drillsList', $drillsList);
    }


    public function contacts() {

        $drillsList = Drill::select('name as drill', 'phone_number',
                'email', 'address')
                ->get();

        return view('drill.contacts')->with('drillsList', $drillsList);
    }


    public function location() {

        return view('drill.location');
    }

    public function view($id)
    {
        $drill = Drill::leftJoin('drill_types', 'drill_types.id', '=', 'drills.drill_type_id')
            ->leftJoin('points', 'points.id', '=', 'drills.workers_transfer')
            ->select(['drills.name as drill',
                'germany_name', 'drill_types.name as drill_type',
                'points.name as workers_transfer', 'phone_number',
                'email', 'drills.note as note'])
            ->find($id);

        $history = Point::select('id', 'name')
            ->where('drill_id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        $workers = Worker::leftJoin('positions', 'positions.id', '=', 'workers.position_id')
            ->select('workers.id as id', 'workers.name as worker',
                'workers.phone_number', 'positions.name as position')
            ->where('workers.drill_id', '=', $id)
            ->get();

        return view('drill.view')->with([
            'drill' => $drill,
            'historyList' => $history,
            'workersList' => $workers
        ]);
    }
}
