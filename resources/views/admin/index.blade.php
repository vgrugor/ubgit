@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Панель адміністратора</h1>
            <br/>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('adminOrganizationsList') }}">Керування організаціями</a>
                    <span class="badge">{{ $count['organizations'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminDepartmentsList') }}">Керування відділами</a>
                    <span class="badge">{{ $count['departments'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminDivisionsList') }}">Керування підрозділами</a>
                    <span class="badge">{{ $count['divisions'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminPositionsList') }}">Керування посадами</a>
                    <span class="badge">{{ $count['positions'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminWorkersList') }}">Керування працівниками</a>
                    <span class="badge">{{ $count['workers'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminVpnStatusesList') }}">Статуси для vpn</a>
                    <span class="badge">{{ $count['vpnStatuses'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminDrillsList') }}">Керування буровими верстатами</a>
                    <span class="badge">{{ $count['drills'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminPointsList') }}">Керування свердловинами (точками)</a>
                    <span class="badge">{{ $count['points'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminMotorcadesList') }}">Керування колонами автомобільної техніки</a>
                    <span class="badge">{{ $count['motorcades'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminDrillTypesList') }}">Типи свердловин</a>
                    <span class="badge">{{ $count['drillTypes'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminActualStagesList') }}">Фактичні стадії буріння</a>
                    <span class="badge">{{ $count['actualStages'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminInternetProvidersList') }}">Провайдери інтернету</a>
                    <span class="badge">{{ $count['internetProviders'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminInternetRequestTypesList') }}">Типи заявок на інтернет</a>
                    <span class="badge">{{ $count['internetRequestType'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminInternetRequestsList') }}">Заявки на інтернет</a>
                    <span class="badge">{{ $count['internetRequest'] }}</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminVideoSurveillancesList') }}">Відеонагляд на бурових</a>
                    <span class="badge">{{ $count['videoSurveillance'] }}</span>
                </li>
                <!--
                <li class="list-group-item">
                    <a href="{{ route('adminInternetStatusesList') }}">Статуси інтернету</a>
                    <span class="badge">{{ $count['internetStatuses'] }}</span>
                </li>
              -->
                <!--
                <li class="list-group-item">
                    <a href="#">Керування користувачами сайту</a>
                    <span class="badge">25</span>
                </li>
                -->
            </ul>
        </div>
    </div>
@endsection
