<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Organization;

class AdminOrganizationController extends Controller
{
    //-------------------------СПИСОК ОРГАНИЗАЦИЙ-------------------------------
    
    public function organizationsList()
    {
        $organizations = Organization::select('id', 'name', 'address', 'note')->get();
        
        return view('admin.organization.list')->with('organizationsList', $organizations);
    }
    
    //--------------------------------------------------------------------------

    
    //-----------------------ДОБАВЛЕНИЕ ОРГАНИЗАЦИИ-----------------------------
    
    public function add()
    {
        return view('admin.organization.add');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
                'name' => 'required|max:50|unique:organizations,name',
                'address' => 'max:200'
            ]);
        
        $data = $request->all();
        
        $organization = new Organization;
        $organization->fill($data);
        $organization->save();
        
        return redirect('workerlist');
    }
    
    //--------------------------------------------------------------------------
    
    
    //------------------------------РЕДАКТИРОВАНИЕ ОРГАНИЗАЦИИ------------------
    
    public function update($id)
    {
        $organization = Organization::find($id);
        
        return view('admin.organization.update')->with('organization', $organization);
    }
    
    public function updateSave($id, Request $request)
    {
        $organization = Organization::find($id);
        
        $this->validate($request, [
            'name' => 'required|max:50|unique:organizations,name',
            'address' => 'max:200'
        ]);
        
        $organization->name = $request->input('name');
        $organization->address = $request->input('address');
        $organization->note = $request->input('note');
        
        $organization->save();
        
        return redirect()->route('adminOrganizationsList'); //->with('success', 'Организация была добавлена');
    }
    
    //--------------------------------------------------------------------------
}
