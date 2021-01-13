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

        return view('drill.list')->with(['drillsList' => $drills]);
    }


    public function internet() {

        return view('drill.internet');
    }


    public function contacts() {

        $drillsList = Drill::leftJoin('points', 'points.drill_id', '=', 'drills.id')
                ->select('drills.name as drill',
                    'points.name as point', 
                    'phone_number',
                    'email', 'address')
                ->where('points.is_actual', 1)
                ->get();
        
        //dd($drillsList);
        
        return view('drill.contacts')->with('drillsList', $drillsList);
    }


    public function location() {

        return view('drill.location');
    }

    public function view($id)
    {
        $drill = Drill::leftJoin('drill_types', 'drill_types.id', '=', 'drills.drill_type_id')
            ->leftJoin('points', 'points.id', '=', 'drills.workers_transfer')
            ->select(['drills.id as id',
                'drills.name as drill',
                'germany_name', 'drill_types.name as drill_type',
                'points.name as workers_transfer', 'points.id as point_id', 'phone_number',
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
