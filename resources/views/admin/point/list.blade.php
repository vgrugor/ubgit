@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Керування свердловинами (точками)</h1>
            <br/>
            <p class="text-right">
                <a href="{{ route('pointAdd') }}">
                    <i class="fas fa-plus-circle"></i>
                    Додати свердловину
                </a>
            </p>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Назва</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Код верстата</th>
                        <th scope="col">Код верстата Bentec</th>
                        <th scope="col">Актуальна стадія буріння</th>
                        <th scope="col">Примітка</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach ($pointsList as $pointItem)
                        <tr>
                            <td>{{ $pointItem->id }}</td>
                            <td><a href="{{ route('viewPoint', ['id' => $pointItem->id]) }}">{{ $pointItem->point }}</a></td>
                            <td>{{ $pointItem->type }}</td>
                            <td>{{ $pointItem->drill }}</td>
                            <td>{{ $pointItem->germany_name }}</td>
                            <td>{{ $pointItem->actual_stage }}</td>
                            <td>{{ $pointItem->note }}</td>
                            <td>
                                <a href="{{ route('pointUpdate', $pointItem->id) }}" title="Редагувати"><i class="far fa-edit"></i></a>
                            </td>
                            <td>
                                <a href="#" title="Видалити"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
