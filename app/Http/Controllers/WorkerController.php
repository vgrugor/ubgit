<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Worker;
use App\Department;
use App\Drill;
use App\Organization;

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
        
        $organizations = Organization::select('name')->get();
        
        $departments = Department::leftJoin('organizations', 'organizations.id', '=', 'departments.organization_id')
                ->select('departments.name as department',
                        'organizations.name as organization')
                ->orderBy('department', 'asc')
                ->get();
        
        $drills = Drill::select('name')->orderBy('name', 'asc')->get();
        
        return view('worker.list')->with(['workersList' => $workers, 
            'organizationsList' => $organizations, 
            'departmentsList' => $departments,
            'drillsList' => $drills]);
    }
    
    public function view($id)
    {
        $worker = Worker::leftJoin('positions', 'positions.id', '=', 'workers.position_id')
                ->leftJoin('departments', 'departments.id', '=', 'positions.department_id')
                ->leftJoin('divisions', 'divisions.id', '=', 'positions.division_id')
                ->leftJoin('organizations', 'organizations.id', '=', 'positions.organization_id')
                ->leftJoin('drills', 'drills.id', '=', 'workers.drill_id')
                ->leftJoin('vpn_statuses', 'vpn_statuses.id', '=', 'workers.vpn_status_id')
                ->select(['workers.id', 'workers.name', 'workers.phone_number',
                    'workers.account_ad', 'workers.email', 'workers.note', 'workers.date_refresh', 
                    'organizations.name as organization',
                    'departments.name as department',
                    'divisions.name as division',
                    'positions.name as position',
                    'drills.name as drill',
                    'vpn_statuses.name as vpn'])
                ->where('workers.id', $id)
                ->first();
        
        return view('worker.view')->with('worker', $worker);
    }
    
    public function add()
    {
        $organizations = Organization::select('id', 'name')->get();
        $drills = Drill::select('id', 'name')->get();
        
        return view('worker.add')->with(['organizationsList' => $organizations,
                'drillsList' => $drills
            ]);
    }
    
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'organization_id' => 'required',
            'department_id' => 'required',
            'division_id' => '',
            'position_id' => 'required',
            'drill_id' => '',
            'name' => 'required|max:100',
            'account_ad' => 'max:50|unique:workers,account_ad',
            'phone_number' => 'max:14|unique:workers,phone_number',
            'email' => 'max:256|unique:workers,email',
            'vpn_status_id' => '',
            'date_refresh' => '',
            'note' => ''
        ]);
        
    }
}
