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
}
