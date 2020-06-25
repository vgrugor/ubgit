<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Organization;
use App\Department;
use App\Division;
use App\Position;

class AdminPositionController extends Controller
{
    //--------------------------СПИСОК ДОЛЖНОСТЕЙ-------------------------------
    
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
                ->leftJoin('workers', 'workers.position_id', '=', 'positions.id')
                ->select('organizations.name as organization',
                        'departments.name as department', 
                        'divisions.name as division',
                        'workers.name as worker',
                        'positions.id as id',
                        'positions.name as name', 
                        'divisions.note as note')
                ->get();
        
        return view('admin.position.list')
                ->with(['positionsList' => $positions,
                    'organizationsList' => $organizations,
                    'departmentsList' => $departments
                    ]);
    }
    
    //--------------------------------------------------------------------------

    //-----------------------ДОБАВЛЕНИЯ ДОЛЖНОСТИ-------------------------------
    
    public function add()
    {
        $organizations = Organization::select('id', 'name')->get();
        $departments = Department::select('id', 'name')->get();
        $divisions = Division::select('id', 'name')->get();
        $locations = $organizations;
        
        return view('admin.position.add')->with([
            'organizationsList' => $organizations,
            'departmentsList' => $departments,
            'divisionsList' => $divisions,
            'locationsList' => $locations
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'organization_id' => 'required|integer',
            'department_id' => 'required|integer',
            'division_id' => 'integer',
            'location_id' => 'integer',
            'name' => 'required|max:256'
        ]);
        
        $data = $request->all();
        
        $position = new Position;
        $position->fill($data);
        
        $position->save();
        
        return redirect()->route('adminPositionsList');
    }
    
    //--------------------------------------------------------------------------
    
    //--------------------РЕДАКТИРОВАНИЕ ДОЛЖНОСТИ------------------------------
    
    public function update($id)
    {
        $position = Position::find($id);
        
        $organizations = Organization::select('id', 'name')->get();
        $departments = Department::select('id', 'name')
                ->where('organization_id', $position->organization_id)
                ->get();
        
        $divisions = Division::select('id', 'name')
                ->where('department_id', $position->department_id)
                ->get();
        
        $locations = $organizations;
        
        return view('admin.position.update')->with(['position' => $position,
            'organizationsList' => $organizations,
            'departmentsList' => $departments,
            'divisionsList' => $divisions,
            'locationsList' => $locations
        ]);
    }
    
    public function save($id, Request $request)
    {
        $position = Position::find($id);
        
        $this->validate($request, [
            'organization_id' => 'required|integer',
            'department_id' => 'required|integer',
            'division_id' => 'required|integer',
            'location_id' => 'required|integer',
            'name' => 'required|max:256',
        ]);
        
        $position->organization_id = $request->organization_id;
        $position->department_id = $request->department_id;
        $position->division_id = $request->division_id;
        $position->location_id = $request->location_id;
        $position->name = $request->name;
        
        $position->save();
        
        return redirect()->route('adminPositionsList');
    }
    
    //--------------------------------------------------------------------------
}
