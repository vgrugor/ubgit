@extends('layouts.site')

@section('content')
    @if ($worker)
        
        <div class="row">
            <div class="col-sm-10">
                <h1>
                    {{ $worker->name }}
                </h1>
            </div>
            <div class="col-sm-2 text-right">
                <a href="{{ route('workerUpdate', $worker->id) }}" title="Редагувати"><i class="far fa-edit"></i></a>
                <a href="#" title="Звільнити"><i class="far fa-calendar-times"></i></a>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Транслітерація:</strong></p>
            </div>
            <div class="col">
                {{ App\Worker::getTranslitName($worker->name) }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Обліковий запис в AD:</strong></p>
            </div>
            <div class="col">
                {{ $worker->account_ad }}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Організація:</strong></p>
            </div>
            <div class="col">
                {{ $worker->organization }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Відділ:</strong></p>
            </div>
            <div class="col">
                {{ $worker->department }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Підрозділ:</strong></p>
            </div>
            <div class="col">
                {{ $worker->division }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Посада:</strong></p>
            </div>
            <div class="col">
                {{ $worker->position }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Бурова:</strong></p>
            </div>
            <div class="col">
                {{ $worker->drill }}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Номер телефону 1:</strong></p>
            </div>
            <div class="col">
                {{ $worker->phone_number }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Номер телефону 2:</strong></p>
            </div>
            <div class="col">
                {{ $worker->phone_number2 }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Email:</strong></p>
            </div>
            <div class="col">
                {{ $worker->email }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>vpn:</strong></p>
            </div>
            <div class="col">
                {{ $worker->vpn }}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Примітка:</strong></p>
            </div>
            <div class="col">
                {{ $worker->note }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Дата оновлення:</strong></p>
            </div>
            <div class="col">
                {{ $worker->date_refresh }}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Працює за ПК:</strong></p>
            </div>
            <div class="col">

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Користувача налаштовано на ПК:</strong></p>
            </div>
            <div class="col">

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <a href="#" data-toggle="collapse" data-target="#hide-me">Підпис для пошти</a>
                <div id="hide-me" class="collapse in">
                    <p>
                        З повагою,<br>
                        {{ $worker->name }} <br>
                        {{ $worker->position }} {{ $worker->drill }}
                    <p>

                    <p>
                        Полтавське ВБР<br>
                        БУ «Укрбургаз» <br>
                        АТ «Укргазвидобування»
                    </p>
                    <img src=" {{ asset('img/worker/view/logo.jpg') }}">

                    <p>
                        вул. Ковалівська, 5<br>
                        м. Полтава, 36015, а/с 1715, Україна
                    </p>

                    <p>
                        Тел.: {{ $worker->phone_number }} <br>
                        <a href="#">{{ $worker->email }}</a>
                    </p>
                </div>
            </div>
        </div>
    
    @endif
@endsection