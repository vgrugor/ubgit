@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Керування буровими верстатами</h1>
            <br/>
            <p class="text-right">
                <a href="{{ route('drillAdd') }}">
                    <i class="fas fa-plus-circle"></i>
                    Додати буровий верстат
                </a>
            </p>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Назва</th>
                        <th>Місцезнаходження бурової бригади</th>
                        <th scope="col">Примітка</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach ($drillsList as $drillItem)
                        <tr>
                            <td>{{ $drillItem->id }}</td>
                            <td>{{ $drillItem->type }}</td>
                            <td><a href="{{ route('viewDrill', ['id' => $drillItem->id]) }}">{{ $drillItem->drill }}</a></td>
                            <td>
                                @if($drillItem->point_id)
                                    <a href="{{ route('viewPoint', ['id' => $drillItem->point_id ]) }}">{{ $drillItem->point }}</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $drillItem->note }}</td>
                            <td>
                                <a href="{{ route('drillUpdate', $drillItem->id) }}" title="Редагувати"><i class="far fa-edit"></i></a>
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
