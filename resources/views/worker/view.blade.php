@extends('layouts.site')

@section('content')
    @if ($worker)
        
        <div class="row">
            <div class="col">
                <h1>{{ $worker->name }}</h1>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Транслітерація:</strong></p>
            </div>
            <div class="col">
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Обліковий запис в AD:</strong></p>
            </div>
            <div class="col">
                
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Організація:</strong></p>
            </div>
            <div class="col">
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Відділ:</strong></p>
            </div>
            <div class="col">
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Підрозділ:</strong></p>
            </div>
            <div class="col">
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Посада:</strong></p>
            </div>
            <div class="col">
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Бурова:</strong></p>
            </div>
            <div class="col">
                
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Номер телефону:</strong></p>
            </div>
            <div class="col">
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Email:</strong></p>
            </div>
            <div class="col">
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>vpn:</strong></p>
            </div>
            <div class="col">
                
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
                        
                    <p>

                    <p>
                        Полтавське ВБР<br>
                        БУ «Укрбургаз» <br>
                        АТ «Укргазвидобування»
                    </p>
                    <img src="/template/images/worker/view/logo.jpg">

                    <p>
                        вул. Ковалівська, 5<br>
                        м. Полтава, 36015, а/с 1715, Україна
                    </p>

                    <p>
                        Тел.: <br>
                        
                    </p>
                </div>
            </div>
        </div>
    
    @endif
@endsection