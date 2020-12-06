@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Керування статусами систем відеоспостереження на бурових</h1>
            <br/>
            <p class="text-right">
                <a href="{{ route('videoSurveillanceStatusAdd') }}">
                    <i class="fas fa-plus-circle"></i>
                    Додати статус
                </a>
            </p>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Назва</th>
                    <th scope="col">Порядок сортування</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach($videoSurveillanceStatusesList as $videoSurveillanceStatusItem)
                        <tr>
                            <td>{{ $videoSurveillanceStatusItem->id }}</td>
                            <td>{{ $videoSurveillanceStatusItem->name }}</td>
                            <td>{{ $videoSurveillanceStatusItem->order_by }}</td>
                            <td>
                                <a href="{{ route('videoSurveillanceStatusUpdate', $videoSurveillanceStatusItem->id) }}" title="Редагувати"><i class="far fa-edit"></i></a>
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