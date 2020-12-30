@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Бурові верстати</h1>
            <br/>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Назва</th>
                        <th>Місцезнаходження бурової бригади</th>
                        <th scope="col">Примітка</th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach ($drillsList as $drillItem)
                        <tr>
                            <td>{{ $drillItem->id }}</td>
                            <td>{{ $drillItem->type }}</td>
                            <td><a href="{{ route('viewDrill', ['id' => $drillItem->id]) }}">{{ $drillItem->drill }}</a></td>
                            <td>
                                @if ($drillItem->point_id)
                                    <a href="{{ route('viewPoint', ['id' => $drillItem->point_id ]) }}">{{ $drillItem->point }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $drillItem->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
