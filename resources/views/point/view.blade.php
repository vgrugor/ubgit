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
            <a href="#" title="Редагувати"><i class="far fa-edit"></i></a>
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
            Пн.ш. {{ $point->nld }} {{ $point->nlm }} {{ $point->nls }} </br>
            Сх.д. {{ $point->eld }} {{ $point->elm }} {{ $point->els }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>GPS-координати</strong></p>
        </div>
        <div class="col">

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
            {{ $point->date_building }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Дата початку буріння:</strong></p>
        </div>
        <div class="col">
            {{ $point->date_drilling }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Дата початку демонтажу:</strong></p>
        </div>
        <div class="col">
            {{ $point->date_demount }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Дата передачі замовнику:</strong></p>
        </div>
        <div class="col">
            {{ $point->date_transfer }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Дата оновлення інформації:</strong></p>
        </div>
        <div class="col">
            {{ $point->date_refresh }}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Актуальна стадія буріння:</strong></p>
        </div>
        <div class="col">

        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Дата оновлення інформації про стадію буріння:</strong></p>
        </div>
        <div class="col">

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Примітка</strong></p>
        </div>
        <div class="col">

        </div>
    </div>

@endsection
