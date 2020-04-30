<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Organization;
use App\Department;
use App\Division;
use App\Position;
use App\Worker;
use App\Drill_type;
use App\Vpn_status;
use App\Internet_status;
use App\Actual_stage;

class DirectoryController extends Controller
{
    public function organizationsList()
    {
        $organizations = Organization::select('name', 'address', 'note')->get();
        
        return view('directory.organizations')->with('organizationsList', $organizations);
    }
    
    public function departmentsList()
    {
        $organizations = Organization::select('name')->get();
        
        $departments = Department::leftJoin('organizations', 'organizations.id', '=', 'departments.organization_id')
                ->select('organizations.name as organization',
                        'departments.name as name', 
                        'phone_number', 
                        'departments.note as note')
                ->get();
        
        return view('directory.departments')
                ->with([
                    'departmentsList' => $departments, 
                    'organizationsList' => $organizations
                ]);
    }
    
    public function divisionsList()
    {
        $divisions = Division::leftJoin('organizations', 'organizations.id', '=', 'divisions.organization_id')
                ->leftJoin('departments', 'departments.id', '=', 'divisions.department_id')
                ->select('organizations.name as organization',
                        'departments.name as department', 
                        'divisions.name as name', 
                        'divisions.note as note')
                ->get();
        
        return view('directory.divisions')->with('divisionsList', $divisions);
    }
    
    public function positionsList()
    {
        $organizations = Organization::select('name')->get();
        
        $departments = Department::leftJoin('organizations', 'organizations.id', '=', 'departments.organization_id')
                ->select('departments.name as department',
                        'organizations.name as organization')
                ->orderBy('department', 'asc')
                ->get();
        
        $positions = Position::leftJoin('organizations', 'organizations.id', '=', 'positions.organization_id')
                ->leftJoin('departments', 'departments.id', '=', 'positions.department_id')
                ->leftJoin('divisions', 'divisions.id', '=', 'positions.division_id')
                ->select('organizations.name as organization',
                        'departments.name as department', 
                        'divisions.name as division', 
                        'positions.name as name', 
                        'divisions.note as note')
                ->get();
        
        return view('directory.positions')
                ->with(['positionsList' => $positions,
                    'organizationsList' => $organizations,
                    'departmentsList' => $departments
                    ]);
    }
    
    public function workersList()
    {
        $workers = Worker::leftJoin('vpn_statuses', 'vpn_statuses.id', '=', 'workers.vpn_status_id')
                ->select('workers.id as id', 'workers.name as name', 'account_ad', 'phone_number', 'vpn_statuses.name as vpn', 'phone_number2', 'email', 'note')
                ->get();
        
        return view('directory.workers')->with('workersList', $workers);
    }


    public function drillsTypesList()
    {
        $drillTypes = Drill_type::select('name')->get();
        
        return view('directory.drill_types')->with('drillTypesList', $drillTypes);
    }
    
    public function vpnStatusesList()
    {
        $vpnStatuses = Vpn_status::select('name')->get();
        
        return view('directory.vpn_statuses')->with('vpnStatusesList', $vpnStatuses);
    }
    
    public function dataGroupStatusesList()
    {
        $internetStatuses = Internet_status::select('name')->get();
        
        return view('directory.internet_statuses')->with('internetStatusesList', $internetStatuses);
    }
    
    public function actualStagesList()
    {
        $actualStages = Actual_stage::select('name')->get();
        
        return view('directory.actual_stages')->with('actualStagesList', $actualStages);
    }
}
