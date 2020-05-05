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
                ->select('organizations.name as organization',
                        'departments.name as department', 
                        'divisions.name as division', 
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
        
        return view('admin.position.add')->with([
            'organizationsList' => $organizations,
            'departmentsList' => $departments,
            'divisionsList' => $divisions
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'organization_id' => 'required|integer',
            'department_id' => 'required|integer',
            'division_id' => 'integer',
            'name' => 'required|max:256'
        ]);
        
        $data = $request->all();
        
        $position = new Position;
        $position->fill($data);
        
        $position->save();
        
        return redirect('workerlist');
    }
    
    //--------------------------------------------------------------------------
}