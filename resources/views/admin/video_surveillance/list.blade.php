@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Керування відеонаглядом на бурових</h1>
            <br/>
            <p class="text-right">
                <a href="{{ route('videoSurveillanceAdd') }}">
                    <i class="fas fa-plus-circle"></i>
                    Додати відеонагляд на бурову
                </a>
            </p>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Свердловина</th>
                        <th scope="col">Дата інсталяції</th>
                        <th scope="col">Дата демонтажу</th>
                        <th scope="col">Примітка</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach ($videoSurveillancesList as $videoSurveillance)
                        <tr>
                            <td>{{ $videoSurveillance->id }}</td>
                            <td><a href="{{ route('viewPoint', ['id' => $videoSurveillance->point_id ]) }}">{{ $videoSurveillance->point }}</a></td>
                            <td>{{ $videoSurveillance->date_installation > 0 ? date("d.m.Y", strtotime($videoSurveillance->date_installation)) : '-' }}</td>
                            <td>{{ $videoSurveillance->date_demount > 0 ? date("d.m.Y", strtotime($videoSurveillance->date_demount)) : '-' }}</td>
                            <td>{{ $videoSurveillance->note }}</td>
                            <td>
                                <a href="{{ route('videoSurveillanceUpdate', $videoSurveillance->id) }}" title="Редагувати"><i class="far fa-edit"></i></a>
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
