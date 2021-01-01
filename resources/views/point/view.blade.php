@extends('layouts.site')

@section('content')

    </br>
    <div class="row">
        <div class="col-sm-10">
            <h1>
                {{ $point->point }}
            </h1>
        </div>
        <div class="col-sm-2 text-right">
            <a href="{{ route('pointUpdate', $point->id) }}" title="Редагувати"><i class="far fa-edit"></i></a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Статус</strong></p>
        </div>
        <div class="col">
          @if($point->is_actual)
              Актуальна
          @else
              Неактуальна
          @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Адреса:</strong></p>
        </div>
        <div class="col">
            {{ $point->address }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>GEO-координати:</strong></p>
        </div>
        <div class="col">
            @if ($point->geo)
                {{ $point->geo['nld'] }}<sup>0</sup>{{ $point->geo['nlm'] }}'{{ $point->geo['nls'] }}"Пн.ш. 
                {{ $point->geo['eld'] }}<sup>0</sup>{{ $point->geo['elm'] }}'{{ $point->geo['els'] }}"Сх.д. 
            @else
                -
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>GPS-координати</strong></p>
        </div>
        <div class="col">
            @if ($point->gps)
                {{ $point->gps }}
            @else
                -
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Координати отримано:</strong></p>
        </div>
        <div class="col">
            @if($point->coordinate_stage)
                В бурінні
            @else
                При плануванні
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Дата початку монтажу:</strong></p>
        </div>
        <div class="col">
            {{ $point->date_building > 0 ? date("d.m.Y", strtotime($point->date_building)) : '-' }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Дата початку буріння:</strong></p>
        </div>
        <div class="col">
            {{ $point->date_drilling > 0 ? date("d.m.Y", strtotime($point->date_drilling)) : '-' }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Дата початку демонтажу:</strong></p>
        </div>
        <div class="col">
            {{ $point->date_demount > 0 ? date("d.m.Y", strtotime($point->date_demount)) : '-' }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Дата передачі замовнику:</strong></p>
        </div>
        <div class="col">
            {{ $point->date_transfer > 0 ? date("d.m.Y", strtotime($point->date_transfer)) : '-' }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Дата оновлення інформації:</strong></p>
        </div>
        <div class="col">
            {{ $point->date_refresh > 0 ? date("d.m.Y", strtotime($point->date_refresh)) : '-' }}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Актуальна стадія буріння:</strong></p>
        </div>
        <div class="col">
            {{ $point->actual_stage }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Дата оновлення інформації про стадію буріння:</strong></p>
        </div>
        <div class="col">
            {{ $point->date_actual_stage_refresh > 0 ? date("d.m.Y", strtotime($point->date_actual_stage_refresh)) : '-' }}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Заявки на інтернет:</strong></p>
        </div>
        <div class="col">
            @if(count($internetRequestsList))
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Провайдер</th>
                            <th scope="col">Тип заявки</th>
                            <th scope="col">Дата відправки</th>
                            <th scope="col">Дата в заявці</th>
                            <th scope="col">Заявка закрита</th>
                            <th scope="col">Дата закриття</th>
                            <th scope="col">Примітка</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                        @foreach ($internetRequestsList as $internetRequestItem)
                            <tr>
                                <td>{{ $internetRequestItem->provider }}</td>
                                <td>{{ $internetRequestItem->type }}</td>
                                <td>{{ $internetRequestItem->date_send > 0 ? date("d.m.Y", strtotime($internetRequestItem->date_send)) : '-' }}</td>
                                <td>{{ $internetRequestItem->date_request > 0 ? date("d.m.Y", strtotime($internetRequestItem->date_request)) : '-' }}</td>
                                <td>
                                    @if($internetRequestItem->is_completed)
                                        <div class="alert alert-success" role="alert">
                                            Так
                                        </div>
                                    @else
                                        <div class="alert alert-danger" role="alert">
                                            Ні
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $internetRequestItem->date_completion > 0 ? date("d.m.Y", strtotime($internetRequestItem->date_completion)) : '-' }}</td>
                                <td>{{ $internetRequestItem->note }}</td>
                                <td>
                                    <a href="{{ route('internetRequestUpdate', $internetRequestItem->id) }}" title="Редагувати"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else -
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Відеоспостереження:</strong></p>
        </div>
        <div class="col">
            @if($videoSurveillance)
                {{ $videoSurveillance->video_surveillance_status }}
            @else
                <a href="{{ route('videoSurveillanceAdd') }}"  title="Додати відеонагляд на бурову">
                    <i class="fas fa-plus-circle"></i>

                </a>
            @endif
        </div>
    </div>
    @if($videoSurveillance)
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Дата інсталяції відеоспостереження:</strong></p>
            </div>
            <div class="col">
                {{ $videoSurveillance->date_installation > 0 ? date("d.m.Y", strtotime($videoSurveillance->date_installation)) : '-' }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Дата демонтажу відеоспостереження:</strong></p>
            </div>
            <div class="col">
                {{ $videoSurveillance->date_demount > 0 ? date("d.m.Y", strtotime($videoSurveillance->date_demount)) : '-' }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Примітка по відеоспостереженню:</strong></p>
            </div>
            <div class="col">
                {{ $videoSurveillance->note }}
            </div>
        </div>
    @endif
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Примітка</strong></p>
        </div>
        <div class="col">
            {{ $point->note }}
        </div>
    </div>


@endsection
