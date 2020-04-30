@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Вітаємо, адміністратор!</h1>
            <br/>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('adminOrganizationsList') }}">Керування організаціями</a>
                    <span class="badge">25</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminDepartmentsList') }}">Керування відділами</a>
                    <span class="badge">25</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminDivisionsList') }}">Керування підрозділами</a>
                    <span class="badge">25</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminPositionsList') }}">Керування посадами</a>
                    <span class="badge">25</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminWorkersList') }}">Керування працівниками</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminDrillsList') }}">Керування буровими</a>
                    <span class="badge">25</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminDrillTypesList') }}">Типи бурових</a>
                    <span class="badge">25</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminInternetStatusesList') }}">Статуси інтернету</a>
                    <span class="badge">25</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminVpnStatusesList') }}">Статуси для vpn</a>
                    <span class="badge">25</span>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('adminActualStagesList') }}">Фактичні стадії буріння</a>
                    <span class="badge">25</span>
                </li>
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
