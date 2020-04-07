@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Свердловини Полтавського ВБР</h1>
            <br/>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Назва</th>
                        <th scope="col">Етап за килимом</th>
                        <th scope="col">Етап фактично</th>
                        <th scope="col">Примітка</th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach ($drillsList as $drillItem)
                        <tr>
                            <td>{{ $drillItem->number }}</td>
                            <td>{{ $drillItem->type }}</td>
                            <td>{{ $drillItem->drill }}</td>
                            <td></td>
                            <td>{{ $drillItem->actual_stage }}</td>
                            <td>{{ $drillItem->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection