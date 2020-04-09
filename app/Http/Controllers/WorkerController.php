<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Worker;

class WorkerController extends Controller
{
    public function index() 
    {
        $workers = Worker::leftJoin('drills', 'workers.drill_id', '=', 'drills.id')
                ->leftJoin('positions', 'workers.position_id', '=', 'positions.id')
                ->leftJoin('organizations', 'positions.organization_id', '=', 'organizations.id')
                ->leftJoin('departments', 'positions.department_id', '=', 'departments.id')
                ->leftJoin('divisions', 'positions.division_id', '=', 'divisions.id')
                ->select(['workers.id', 'workers.name as name', 'workers.note',
                    'drills.name as drill', 
                    'positions.name as position',
                    'organizations.name as organization',
                    'departments.name as department',
                    'divisions.name as division'])
                ->orderBy('name', 'asc')
                ->get();
        
        return view('worker.list')->with('workersList', $workers);
    }
    
    public function view($id)
    {
        $worker = Worker::select(['id', 'name', 'phone_number'])->where('id', $id)->first();
        
        return view('worker.view')->with('worker', $worker);
    }
}
