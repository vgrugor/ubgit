@extends('layouts.site')

@section('content')
    
    <div id="page-name" data-page="workerList"></div>

    <div class="row">
        <div class="col">
                    <h1 class="text-center">Список працівників</h1>
                    <br/>
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">ПІБ</th>
                          <th scope="col">Посада</th>
                          <th scope="col">vpn</th>
                          <th scope="col">Дата оновлення</th>
                          <th scope="col">Примітка</th>
                        </tr>
                      </thead>
                      <tbody id="worker-list-table">
                          @foreach ($workersList as $workerItem)
                            <tr>
                                <td>{{ $workerItem->name }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ $workerItem->date_refresh }}</td>
                                <td>{{ $workerItem->note }}</td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
        </div>
    </div>
    
@endsection