<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vpn_status;

class AdminVpnStatusController extends Controller
{
    //---------------------СПИСОК СТАТУСОВ VPN----------------------------------
    
    public function vpnStatusesList()
    {
        $vpnStatuses = Vpn_status::select('id', 'name')->get();
        
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
        $vpn_status = Vpn_status::find($id);
        
        return view('admin.vpn_status.update')->with('vpn_status', $vpn_status);
    }
    
    public function save($id, Request $request)
    {
        $vpn_status = Vpn_status::find($id);
        
        $this->validate($request, [
            'name' => 'required|max:50',
        ]);
        
        $vpn_status->name = $request->input('name');
        
        $vpn_status->save();
        
        return redirect()->route('adminVpnStatusesList');
    }
    
    //--------------------------------------------------------------------------
}
