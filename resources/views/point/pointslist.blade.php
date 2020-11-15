@extends('layouts.site')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <h1 class="text-center">Cвердловини (точки)</h1>
        <br/>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Назва</th>
                    <th scope="col">Тип</th>
                    <th scope="col">Код верстата</th>
                    <th scope="col">Код верстата Bentec</th>
                    <th scope="col">Актуальна стадія буріння</th>
                    <th scope="col">Примітка</th>
                </tr>
            </thead>
            <tbody class="table-striped">
                @foreach ($pointsList as $pointItem)
                    <tr>
                        <td>{{ $pointItem->id }}</td>
                        <td>{{ $pointItem->point }}</td>
                        <td>{{ $pointItem->type }}</td>
                        <td>{{ $pointItem->drill }}</td>
                        <td>{{ $pointItem->germany_name }}</td>
                        <td>{{ $pointItem->actual_stage }}</td>
                        <td>{{ $pointItem->note }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
