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
                          <th scope="col">Організація</th>
                          <th scope="col">Відділ</th>
                          <th scope="col">Підрозділ</th>
                          <th scope="col">Посада</th>
                          <th scope="col">Бурова</th>
                          <th scope="col">ПІБ</th>
                          <th scope="col">Примітка</th>
                        </tr>
                      </thead>
                      <tbody id="worker-list-table">
                          @foreach ($workersList as $workerItem)
                            <tr>
                                <td>{{ $workerItem->organization }}</td>
                                <td>{{ $workerItem->department }}</td>
                                <td>{{ $workerItem->division }}</td>
                                <td>{{ $workerItem->position }}</td>
                                <td>{{ $workerItem->drill }}</td>
                                <td><a href="{{ route('viewWorker', ['id' => $workerItem->id])}}">{{ $workerItem->name }}</a></td>
                                <td>{{ $workerItem->note }}</td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
        </div>
    </div>
    
@endsection