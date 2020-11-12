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
            </div>
        @endif
        <div class="col-sm-6">
            <h4>Незавершено процедуру отримання email:</h4>
        </div>
    </div>
@endsection