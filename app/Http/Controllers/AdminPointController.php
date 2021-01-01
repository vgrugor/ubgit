<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Point;
use App\Drill;
use App\Actual_stage;

use App\Http\Requests\point\PointRequest;

class AdminPointController extends Controller
{

    //---------------------------СПИСОК ТОЧЕК ДЛЯ БУРЕНИЯ-----------------------

    public function pointsList()
    {

        $pointsList = Point::leftJoin('drills', 'drills.id', '=', 'points.drill_id')
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
                ->orderBy('points.created_at', 'desc')
                ->get();


        return view('admin.point.list')->with('pointsList', $pointsList);
    }

    //--------------------------------------------------------------------------


    //----------------------------ДОБАВЛЕНИЕ ТОЧКИ ДЛЯ БУРЕНИЯ------------------

    public function add()
    {
        $drills = Drill::select('id', 'name')->get();

        $actualStages = Actual_stage::select('id', 'name')->get();

        return view('admin.point.add')->with([
            'drillsList' => $drills,
            'actualStagesList' => $actualStages
        ]);
    }

    public function store(PointRequest $request)
    {

        $data = $request->all();

        $point = new Point;
        $point->fill($data);
        $point->save();

        return redirect()->route('adminPointsList');
    }

    //--------------------------------------------------------------------------


    //-------------------РЕДАКТИРОВАНИЕ ТОЧКИ ДЛЯ БУРЕНИЯ-----------------------

    public function update($id)
    {
        $point = Point::find($id);

        $drills = Drill::select('id', 'name')->get();

        $actualStages = Actual_stage::select('id', 'name')->get();

        return view('admin.point.update')
            ->with([
                'point' => $point,
                'drillsList' => $drills,
                'actualStagesList' => $actualStages
            ]);
    }

    public function save($id, PointRequest $request)
    {
        $point = Point::find($id);

        $point->name = $request->input('name');
        $point->drill_id = $request->input('drill_id');
        $point->is_actual = $request->input('is_actual');
        $point->nld = $request->input('nld');
        $point->nlm = $request->input('nlm');
        $point->nls = $request->input('nls');
        $point->eld = $request->input('eld');
        $point->elm = $request->input('elm');
        $point->els = $request->input('els');
        $point->gps = $request->input('gps');
        $point->coordinate_stage = $request->input('coordinate_stage');
        $point->address = $request->input('address');
        $point->date_building = $request->input('date_building');
        $point->date_drilling = $request->input('date_drilling');
        $point->date_demount = $request->input('date_demount');
        $point->date_transfer = $request->input('date_transfer');
        $point->date_refresh = $request->input('date_refresh');
        $point->actual_stage_id = $request->input('actual_stage_id');
        $point->date_actual_stage_refresh = $request->input('date_actual_stage_refresh');
        $point->note = $request->input('note');

        $point->save();

        return redirect()->route('adminPointsList');
    }

    //--------------------------------------------------------------------------
}
