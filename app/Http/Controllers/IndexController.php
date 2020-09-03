<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Worker;

class IndexController extends Controller
{
    public function index() {
        
        $workersNoVpn = Worker::leftJoin('positions', 'positions.id', '=', 'workers.position_id')
                ->leftJoin('vpn_statuses', 'vpn_statuses.id', '=', 'workers.vpn_status_id')
                ->select('workers.id as worker_id',
                        'workers.name as worker', 
                        'workers.note as note',
                        'workers.vpn_status_id',
                        'positions.name as position',
                        'vpn_statuses.name as vpn_status')
                ->where('workers.vpn_status_id', '<', 5)
                ->where('workers.vpn_status_id', '>', 1)
                ->get();
        
        return view('index')
            ->with(['workersNoVpnList' => $workersNoVpn]);
        
    }
    //
}
