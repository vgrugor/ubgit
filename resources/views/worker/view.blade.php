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
                <a href="#" type="button" title="Створення облікового запису в AD" data-toggle="modal" data-target="#exampleModalLong">+AD</a>
                <a href="{{ route('workerUpdate', $worker->id) }}" title="Редагувати"><i class="far fa-edit"></i></a>
                <a href="{{ route('dismissWorker', $worker->id) }}" title="Звільнити"><i class="far fa-calendar-times"></i></a>
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
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Колона автомобільної техніки:</strong></p>
            </div>
            <div class="col">
                {{ $worker->motorcade }}
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
          

        <!-- Модальное окно создания учетной записи в AD -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Створення облікового запису в AD</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <p><strong>Включення ПК в домен:</strong></p>
                            </div>
                            <div class="col-sm-8 text-break">
                                {{ $worker->add_ad }}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><strong>Ім'я ПК:</strong></p>
                            </div>
                            <div class="col">
                                UBG03
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><strong>ПІБ:</strong></p>
                            </div>
                            <div class="col">
                                {{ $worker->name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><strong>Логін:</strong></p>
                            </div>
                            <div class="col">
                                {{ App\Worker::getTranslitName($worker->name) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><strong>Пароль:</strong></p>
                            </div>
                            <div class="col">
                                {{ $password }}<br>
                                a-123456 
                                b-123456<br>
                                c-123456 
                                d-123456
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><strong>email:</strong></p>
                            </div>
                            <div class="col">
                                {{ $worker->email }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><strong>Пароль email:</strong></p>
                            </div>
                            <div class="col">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><strong>Сервер пошти:</strong></p>
                            </div>
                            <div class="col">
                                mailubg
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><strong>Сервер LDAP:</strong></p>
                            </div>
                            <div class="col">
                                ugv.corp
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><strong>Параметри:</strong></p>
                            </div>
                            <div class="col">
                                ou=ugv,dc=ugv,dc=corp
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><strong>vpn:</strong></p>
                            </div>
                            <div class="col">
                                ra.ugv.com.ua
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><strong>Підпис:</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div>
                                    <p>
                                        З повагою,<br>
                                        {{ $worker->name }} <br>
                                        {{ $worker->position }} {{ $worker->drill }}<br>
                                        @if($worker->division)
                                            {{ $worker->division }}<br>
                                        @endif
                                        {{ $worker->department }}
                                    <p>

                                    <p>
                                        {{ $worker->organization }}<br>
                                        @if(!$isBu)
                                            БУ «Укрбургаз» {{ $isBu }}<br>
                                        @endif
                                        АТ «Укргазвидобування»
                                    </p>
                                    <img src=" {{ asset('img/worker/view/logo.jpg') }}">

                                    <p>
                                        {{ $worker->address }}
                                    </p>

                                    <p>
                                        Тел.: {{ $worker->phone_number }} <br>
                                        <a href="#">{{ $worker->email }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><strong>Додатково:</strong></p>
                            </div>
                            <div class="col">
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
            </div>
        </div>
    
    @endif
@endsection