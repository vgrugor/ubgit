@extends('layouts.site')

@section('content')
    <h1>ГОЛОВНА</h1>
    <hr>
    <div class="row">
        @if(count($workersNoVpnList))
            <div class="col-sm-6">
                <h4>Незавершено процедуру отримання VPN:</h4>
                <table class="table table-sm table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Посада</th>
                            <th scope="col">ПІБ</th>
                            <th scope="col">Стадія</th>
                            <th scope="col">Примітка</th>
                        </tr>
                    </thead>
                    <tbody id="tableForSearch">
                        @foreach ($workersNoVpnList as $workerNoVpnItem)
                            <tr>
                                <td>{{ $workerNoVpnItem->position }}</td>
                                <td><a href="{{ route('viewWorker', ['id' => $workerNoVpnItem->worker_id])}}">{{ $workerNoVpnItem->worker }}</a></td>
                                <td>{{ $workerNoVpnItem->vpn_status }}</td>
                                <td>{{ $workerNoVpnItem->note }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
            </div>
        @endif
        <div class="col-sm-6">
            <h4>Незавершено процедуру отримання email:</h4>
            <br>
        </div>
        <div class="col-sm-6">
            <h4>Незакриті заявки на інтернет:</h4>
            <table class="table table-sm table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Свердловина</th>
                        <th scope="col">Провайдер</th>
                        <th scope="col">Тип заявки</th>
                        <th scope="col">Дата відправки заявки</th>
                        <th scope="col">Дата в заявці</th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach ($internetRequestUnfulfilledsList as $internetRequestUnfulfilledItem)
                        <tr>
                            <td><a href="{{ route('viewPoint', ['id' => $internetRequestUnfulfilledItem->point_id]) }}">{{ $internetRequestUnfulfilledItem->point }}</a></td>
                            <td>{{ $internetRequestUnfulfilledItem->provider }}</td>
                            <td>{{ $internetRequestUnfulfilledItem->type }}</td>
                            <td>{{ $internetRequestUnfulfilledItem->date_send > 0 ? date("d.m.Y", strtotime($internetRequestUnfulfilledItem->date_send)) : '-' }}</td>
                            <td>{{ $internetRequestUnfulfilledItem->date_request > 0 ? date("d.m.Y", strtotime($internetRequestUnfulfilledItem->date_request)) : '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        </div>
        <div class="col-sm-6">
            <h4>Найближчі зміни стадій буріння:</h4>
            <br>
        </div>
    </div>
@endsection
