<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Point;
use App\Internet_request;
use App\Video_Surveillance;

class PointController extends Controller
{
    public function pointsList()
    {
      $points = Point::leftJoin('drills', 'drills.id', '=', 'points.drill_id')
              ->leftJoin('drill_types', 'drill_types.id', '=', 'drills.drill_type_id')
              ->leftJoin('actual_stages', 'actual_stages.id', '=', 'points.actual_stage_id')
              ->select(['points.id as id',
                      'points.name as point',
                      'points.note as note',
                      'drills.name as drill',
                      'drills.germany_name as germany_name',
                      'drill_types.name as type',
                      'actual_stages.name as actual_stage'
                  ])
              ->where('points.is_actual', 1)
              ->orderBy('points.drill_id', 'asc')
              ->orderBy('points.created_at', 'desc')
              ->get();

        return view('point.pointslist')->with(['pointsList' => $points ]);
    }

    public function view($id)
    {
        $point = Point::leftJoin('actual_stages', 'actual_stages.id', '=', 'points.actual_stage_id')
            ->select(['points.id as id',
                'points.name as point',
                'is_actual', 'nld', 'nlm', 'nls',
                'eld', 'elm', 'els',
                'coordinate_stage', 'address',
                'date_building', 'date_drilling', 'date_demount', 'date_transfer', 'date_refresh',
                'actual_stages.name as actual_stage',
                'date_actual_stage_refresh', 'points.note as note'])
            ->find($id);

        $internetRequests = Internet_request::leftJoin('Internet_request_types', 'Internet_request_types.id', '=', 'internet_requests.internet_request_type_id')
            ->leftJoin('points', 'points.id', '=', 'internet_requests.point_id')
            ->leftJoin('internet_providers', 'internet_providers.id', '=', 'internet_requests.internet_provider_id')
            ->select([
                'internet_requests.id as id',
                'internet_providers.name as provider',
                'internet_request_types.name as type',
                'internet_requests.date_send',
                'internet_requests.date_request',
                'internet_requests.is_completed',
                'internet_requests.date_completion',
                'internet_requests.note as note'
            ])
            ->where('points.id', '=', $id)
            ->orderBy('internet_requests.date_send', 'desc')
            ->get();

        $videoSurveillance = Video_Surveillance::leftJoin('video_surveillance_statuses', 'video_surveillance_statuses.id', '=', 'video_surveillances.video_surveillance_status_id')
            ->select([
                'video_surveillance_statuses.name as video_surveillance_status',
                'date_installation',
                'date_demount',
                'video_surveillances.note as note'
            ])
            ->where('point_id', '=', $id)
            ->first();

        return view('point.view')->with([
            'point' => $point,
            'internetRequestsList' => $internetRequests,
            'videoSurveillance' => $videoSurveillance
        ]);
    }
}
