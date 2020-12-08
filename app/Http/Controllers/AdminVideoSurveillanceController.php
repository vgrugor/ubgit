<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Video_surveillance;
use App\Point;
use App\Video_surveillance_status;
use App\http\Requests\video_surveillance\videoSurveillanceRequest;

class AdminVideoSurveillanceController extends Controller
{
    //---------------------СПИСОК СИСТЕМ ВИДЕОНАБЛЮДЕНИЯ------------------------

    public function videoSurveillancesList()
    {
        $videoSurveillances = Video_surveillance::leftJoin('points', 'points.id', '=', 'point_id')
            ->leftJoin('video_surveillance_statuses', 'video_surveillance_statuses.id', '=', 'video_surveillances.video_surveillance_status_id')
            ->select([
                'video_surveillances.id as id',
                'points.id as point_id',
                'points.name as point',
                'video_surveillance_statuses.name as video_surveillance_status',
                'date_installation',
                'video_surveillances.date_demount as date_demount',
                'video_surveillances.note as note'])
            ->orderBy('video_surveillances.created_at', 'asc')
            ->get();

        return view('admin.video_surveillance.list')->with(['videoSurveillancesList' => $videoSurveillances]);
    }

    //--------------------------------------------------------------------------


    //---------------------ДОБАВЛЕНИЕ СИСТЕМ ВИДЕОНАБЛЮДЕНИЯ--------------------

    public function add()
    {
        $points = Point::select(['id', 'name'])->where('is_actual', '=', 1)->orderBy('created_at', 'desc')->get();
        $videoSurveillanceStatuses = Video_surveillance_status::select(['id', 'name'])->orderBy('order_by', 'asc')->get();

        return view('admin.video_surveillance.add')
            ->with([
                'pointsList' => $points,
                'videoSurveillanceStatusesList' => $videoSurveillanceStatuses
            ]);
    }

    public function store(VideoSurveillanceRequest $request)
    {
        $data = $request->all();

        $videoSurveillance = new Video_surveillance;
        $videoSurveillance->fill($data);
        $videoSurveillance->save();

        return redirect()->route('adminVideoSurveillancesList');
    }

    //--------------------------------------------------------------------------


    //------------------РЕДАКТИРОВАНИЕ СИСТЕМ ВИДЕОНАБЛЮДЕНИЯ-------------------

    public function update($id)
    {
        $points = Point::select(['id', 'name'])->where('is_actual', '=', 1)->orderBy('created_at', 'desc')->get();
        $videoSurveillanceStatuses = Video_surveillance_status::select(['id', 'name'])->orderBy('order_by', 'asc')->get();
        $videoSurveillance = Video_surveillance::find($id);

        return view('admin.video_surveillance.update')
            ->with(['videoSurveillance' => $videoSurveillance,
            'pointsList' => $points,
            'videoSurveillanceStatusesList' => $videoSurveillanceStatuses
        ]);
    }

    public function save($id, VideoSurveillanceRequest $request)
    {
        $videoSurveillance = Video_surveillance::find($id);

        $videoSurveillance->point_id = $request->input('point_id');
        $videoSurveillance->date_installation = $request->input('date_installation');
        $videoSurveillance->date_demount = $request->input('date_demount');
        $videoSurveillance->note = $request->input('note');

        $videoSurveillance->save();

        return redirect()->route('adminVideoSurveillancesList');
    }

    //--------------------------------------------------------------------------
}
