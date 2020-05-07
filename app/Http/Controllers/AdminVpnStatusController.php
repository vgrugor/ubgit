<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vpn_status;

class AdminVpnStatusController extends Controller
{
    //---------------------СПИСОК СТАТУСОВ VPN----------------------------------
    
    public function vpnStatusesList()
    {
        $vpnStatuses = Vpn_status::select('name')->get();
        
        return view('admin.vpn_status.list')->with('vpnStatusesList', $vpnStatuses);
    }
    
    //--------------------------------------------------------------------------
    
    
    //----------------------------ДОБАВЛЕНИЕ СТАТУСА----------------------------
    
    public function add()
    {
        return view('admin.vpn_status.add');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50'
        ]);
        
        $data = $request->all();
        
        $vpn = new Vpn_status;
        $vpn->fill($data);
        $vpn->save();
        
        return redirect()->route('adminVpnStatusesList');
    }

    //--------------------------------------------------------------------------
    
    
    //---------------------------РЕДАКТИРОВАНИЕ СТАТУСА-------------------------
    
    public function update($id)
    {
        
    }
    
    public function save($id, Request $request)
    {
        
    }
    
    //--------------------------------------------------------------------------
}
