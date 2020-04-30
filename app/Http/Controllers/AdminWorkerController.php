<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Worker;
use App\Department;
use App\Drill;
use App\Organization;

class AdminWorkerController extends Controller
{
    
    //--------------------------СПИСОК СОТРУДНИКОВ------------------------------
    
    public function workersList()
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
        
        return view('admin.worker.list')->with(['workersList' => $workers, 
            'organizationsList' => $organizations, 
            'departmentsList' => $departments,
            'drillsList' => $drills]);
    }
    
    //--------------------------------------------------------------------------
    

    //---------------------ДОБАВЛЕНИЕ СОТРУДНИКА--------------------------------
    
    public function add()
    {
        $organizations = Organization::select('id', 'name')->get();
        $drills = Drill::select('id', 'name')->get();
        
        return view('admin.worker.add')->with(['organizationsList' => $organizations,
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
    
    //--------------------------------------------------------------------------
}
