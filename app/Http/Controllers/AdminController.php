<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Organization;
use App\Department;
use App\Division;
use App\Position;
use App\Worker;
use App\Vpn_status;
use App\Drill;
use App\Point;
use App\Drill_type;
use App\Actual_stage;
use App\Internet_status;
use App\Motorcade;
use App\Internet_provider;
use App\Internet_request_type;
use App\Internet_request;
use App\Video_surveillance;
use App\Video_surveillance_status;

class AdminController extends Controller
{
    public function index()
    {
        $total['organizations'] = Organization::count();
        $total['departments'] = Department::count();
        $total['divisions'] = Division::count();
        $total['positions'] = Position::count();
        $total['workers'] = Worker::count();
        $total['vpnStatuses'] = Vpn_status::count();
        $total['drills'] = Drill::count();
        $total['points'] = Point::count();
        $total['drillTypes'] = Drill_type::count();
        $total['actualStages'] = Actual_stage::count();
        $total['internetStatuses'] = Internet_status::count();
        $total['motorcades'] = Motorcade::count();
        $total['internetProviders'] = Internet_provider::count();
        $total['internetRequestTypes'] = Internet_request_type::count();
        $total['internetRequests'] = Internet_request::count();
        $total['videoSurveillances'] = Video_surveillance::count();
        $total['videoSurveillanceStatuses'] = Video_surveillance_status::count();

        return view('admin.index')->with('count', $total);
    }
}
