<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Worker;
use App\Internet_request;

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

        $internetRequestUnfulfilleds = Internet_request::leftJoin('Internet_request_types', 'Internet_request_types.id', '=', 'internet_requests.internet_request_type_id')
            ->leftJoin('points', 'points.id', '=', 'internet_requests.point_id')
            ->leftJoin('internet_providers', 'internet_providers.id', '=', 'internet_requests.internet_provider_id')
            ->select([
                'internet_requests.id as id',
                'points.name as point',
                'internet_providers.name as provider',
                'internet_request_types.name as type',
                'internet_requests.date_send',
                'internet_requests.date_request',
            ])
            ->where('is_completed', '=', 0)
            ->orderBy('internet_requests.date_send', 'asc')
            ->get();

        return view('index')
            ->with([
                'workersNoVpnList' => $workersNoVpn,
                'internetRequestUnfulfilledsList' => $internetRequestUnfulfilleds
            ]);

    }
    //
}
