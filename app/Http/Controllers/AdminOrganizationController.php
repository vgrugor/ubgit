<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Organization;
use App\Organization_type;

class AdminOrganizationController extends Controller
{
    //-------------------------СПИСОК ОРГАНИЗАЦИЙ-------------------------------
    
    public function organizationsList()
    {
        $organizations = Organization::leftJoin('organization_types', 'organization_types.id', '=', 'organizations.type')
                ->select('organizations.id as id', 
                        'organizations.name as name', 
                        'organization_types.name as type',
                        'organizations.prefix as prefix',
                        'address', 
                        'note')->get();
        
        return view('admin.organization.list')->with('organizationsList', $organizations);
    }
    
    //--------------------------------------------------------------------------

    
    //-----------------------ДОБАВЛЕНИЕ ОРГАНИЗАЦИИ-----------------------------
    
    public function add()
    {
        $organizationTypes = Organization_type::select('id', 'name')->get();
        
        return view('admin.organization.add')->with('organizationTypesList', $organizationTypes);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
                'name' => 'required|max:50|unique:organizations,name',
                'type' => 'integer',
                'prefix' => 'max:10',
                'address' => 'max:200'
            ]);
        
        $data = $request->all();
        
        $organization = new Organization;
        $organization->fill($data);
        $organization->save();
        
        return redirect()->route('adminOrganizationsList');
    }
    
    //--------------------------------------------------------------------------
    
    
    //------------------------------РЕДАКТИРОВАНИЕ ОРГАНИЗАЦИИ------------------
    
    public function update($id)
    {
        $organization = Organization::find($id);
        
        $organizationTypes = Organization_type::select('id', 'name')->get();
        
        return view('admin.organization.update')
                ->with([
                    'organization' => $organization,
                    'organizationTypesList' => $organizationTypes
                ]);
    }
    
    public function save($id, Request $request)
    {
        $organization = Organization::find($id);
        
        $this->validate($request, [
            'name' => 'required|max:50',
            'type' => 'integer',
            'prefix' => 'max:10',
            'address' => 'max:200'
        ]);
        
        $organization->name = $request->input('name');
        $organization->type = $request->input('type');
        $organization->prefix = $request->input('prefix');
        $organization->add_ad = $request->input('add_ad');
        $organization->add_ad2 = $request->input('add_ad2');
        $organization->address = $request->input('address');
        $organization->note = $request->input('note');
        
        $organization->save();
        
        return redirect()->route('adminOrganizationsList'); //->with('success', 'Организация была добавлена');
    }
    
    //--------------------------------------------------------------------------
}
