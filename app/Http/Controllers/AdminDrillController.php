<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Drill;
use App\Drill_type;
use App\Point;

use App\Http\Requests\drill\DrillRequest;

class AdminDrillController extends Controller
{
    //---------------------------СПИСОК БУРОВЫХ---------------------------------

    public function drillsList()
    {
        $drills = Drill::getCompleteInformationAboutDrills();

        return view('admin.drill.list')->with('drillsList', $drills);
    }

    //--------------------------------------------------------------------------


    //----------------------------ДОБАВЛЕНИЕ БУРОВОЙ----------------------------

    public function add()
    {
        $drillTypes = Drill_type::select('id', 'name')->get();

        return view('admin.drill.add')->with([
            'drillTypesList' => $drillTypes
        ]);
    }

    public function store(DrillRequest $request)
    {
        $data = $request->all();

        $drill = new Drill;
        $drill->fill($data);
        $drill->save();

        return redirect()->route('adminDrillsList');
    }

    //--------------------------------------------------------------------------

    //------------------------РЕДАКТИРОВАНИЕ БУРОВОЙ----------------------------

    public function update($id)
    {
        $drill = Drill::find($id);

        $drillTypes = Drill_type::select('id', 'name')->get();

        $points = Point::select('id', 'name')
                ->where('drill_id', '=', $id)
                ->orderBy('created_at', 'desc')
                ->get();

        return view('admin.drill.update')
                ->with([
                    'drill' => $drill,
                    'drillTypesList' => $drillTypes,
                    'pointsList' => $points
                ]);
    }

    public function save($id, DrillRequest $request)
    {
        $drill = Drill::find($id);

        $drill->name = $request->input('name');
        $drill->germany_name = $request->input('germany_name');
        $drill->drill_type_id = $request->input('drill_type_id');
        $drill->workers_transfer = $request->input('workers_transfer');
        $drill->phone_number = $request->input('phone_number');
        $drill->email = $request->input('email');
        $drill->note = $request->input('note');

        $drill->save();

        return redirect()->route('adminDrillsList');
    }

    //--------------------------------------------------------------------------
}
