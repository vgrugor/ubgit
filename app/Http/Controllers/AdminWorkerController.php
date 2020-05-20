<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Worker;
use App\Department;
use App\Division;
use App\Position;
use App\Drill;
use App\Organization;
use App\Vpn_status;
use App\Motorcade;
use App\Organization_type;

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
                ->select(['workers.id as id', 
                    'workers.name as name', 
                    'workers.note as note',
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
        $motorcades = Motorcade::select('id', 'name')->get();
        $vpns = Vpn_status::select('id', 'name')->get();
        
        return view('admin.worker.add')->with(['organizationsList' => $organizations,
                'drillsList' => $drills,
                'motorcadesList' => $motorcades,
                'vpnsList' => $vpns
            ]);
    }
    
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'organization_id' => 'required|integer',
            'department_id' => 'required|integer',
            'division_id' => 'integer',
            'position_id' => 'required|integer',
            'drill_id' => 'integer',
            'motorcade_id' => 'integer',
            'name' => 'required|max:100',
            'account_ad' => 'max:50',
            'phone_number' => 'max:14',
            'phone_number2' => 'max:14',
            'email' => 'max:256',
            'vpn_status_id' => 'integer',
            'date_refresh' => '',
            'note' => ''
        ]);
        
        $data = $request->all();
        
        $worker = new Worker;
        $worker->fill($data);
        $worker->save();
        
        return redirect()->route('viewWorker', $worker->id);
    }
    
    //--------------------------------------------------------------------------
    
    
    //------------------------РЕДАКТИРОВАНИЕ СОТРУДНИКА-------------------------
    
    public function update($id)
    {
        $worker = Worker::leftJoin('positions', 'positions.id', '=', 'workers.position_id')
                ->select('workers.id as id',
                        'workers.name as name',
                        'workers.position_id as position_id',
                        'workers.drill_id as drill_id',
                        'workers.motorcade_id as motorcade_id',
                        'workers.account_ad as account_ad', 
                        'workers.phone_number as phone_number', 
                        'workers.phone_number2 as phone_number2', 
                        'workers.email as email', 
                        'workers.vpn_status_id as vpn_status_id',
                        'workers.date_refresh as date_refresh', 
                        'workers.note as note',
                        'positions.organization_id as organization_id',
                        'positions.department_id as department_id',
                        'positions.division_id as division_id',
                        )
                ->find($id);
        
        $organizations = Organization::select('id', 'name')->get();
        
        $departments = Department::select('id', 'name')
                ->where('organization_id', $worker->organization_id)
                ->get();
        
        $divisions = Division::select('id', 'name')
                ->where('department_id', $worker->department_id)
                ->get();
        
        $positions = Position::leftJoin('workers', 'workers.position_id', '=', 'positions.id')
                ->select('positions.id as id', 'positions.name as name')
                ->where('department_id', $worker->department_id)
                ->where('division_id', $worker->division_id)
                ->whereNull('workers.position_id')
                ->orWhere('workers.position_id', $worker->position_id)
                ->get();
        
        $drills = Drill::select('id', 'name')->get();
        
        $motorcades = Motorcade::select('id', 'name')->get();
        
        $vpns = Vpn_status::select('id', 'name')->get();
        
        //для определения, какой выпадающий список отображать
        $organizationTypeId = Organization::where('id', $worker->organization_id)->pluck('type');
        $organizationType = Organization_type::find($organizationTypeId)->first();
        
        return view('admin.worker.update')->with([
            'organizationsList' => $organizations,
            'departmentsList' => $departments,
            'divisionsList' => $divisions,
            'positionsList' => $positions,
            'drillsList' => $drills,
            'motorcadesList' => $motorcades,
            'vpnsList' => $vpns,
            'worker' => $worker,
            'organizationType' => $organizationType
        ]);
    }
    
    public function save($id, Request $request)
    {
        $worker = Worker::find($id);
        
        $this->validate($request, [
            'organization_id' => 'required|integer',
            'department_id' => 'required|integer',
            'division_id' => 'integer',
            'position_id' => 'required|integer',
            'drill_id' => 'integer',
            'motorcade_id' => 'integer',
            'name' => 'required|max:100',
            'account_ad' => 'max:50',
            'phone_number' => 'max:14',
            'phone_number2' => 'max:14',
            'email' => 'max:256',
            'vpn_status_id' => 'integer',
            'date_refresh' => '',
            'note' => ''
        ]);
        
        $worker->drill_id = $request->drill_id;
        $worker->motorcade_id = $request->motorcade_id;
        $worker->position_id = $request->position_id;
        $worker->name = $request->name;
        $worker->account_ad = $request->account_ad;
        $worker->phone_number = $request->phone_number;
        $worker->phone_number2 = $request->phone_number2;
        $worker->email = $request->email;
        $worker->vpn_status_id = $request->vpn_status_id;
        $worker->date_refresh = $request->date_refresh;
        $worker->note = $request->note;
        
        $worker->save();
        
        return redirect()->route('viewWorker', $worker->id);
    }

    //--------------------------------------------------------------------------
    
    
    //------------------------УВОЛЬНЕНИЕ СОТРУДНИКА-----------------------------
    
    public function dismiss($id)
    {
        $worker = Worker::find($id);
        
        $position = Position::find($worker->position_id);
        
        return view('admin.worker.dismiss')->with(['worker' => $worker,
                'position' => $position
                ]);
    }
    
    public function remove($id)
    {
        $worker = Worker::find($id);
        
        $worker->position_id = NULL;
        
        $worker->save();
        
        return redirect()->route('adminWorkersList');
    }

    //--------------------------------------------------------------------------
}
