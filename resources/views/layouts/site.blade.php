<!doctype html>
<html lang="uk">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Для фильтра в таблице сотрудников-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Подключени е иконок https://fontawesome.com/icons?d=gallery&m=free-->
    <script src="https://kit.fontawesome.com/0f39bd7c71.js" crossorigin="anonymous"></script>
    <title>Полтавське ВБР</title>
  </head>
  <body>
      <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Головна</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Свердловини</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/drill/general">Загальна інформація</a>
                        <a class="dropdown-item" href="/drill/internet">Стан інтернету</a>
                        <a class="dropdown-item" href="/drill/carpet">Килим буріння</a>
                        <a class="dropdown-item" href="/drill/contacts">Контакти</a>
                        <a class="dropdown-item" href="/drill/location">Розташування</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/workerlist">Працівники</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Довідники</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('organizationsList') }}">Організації</a>
                        <a class="dropdown-item" href="{{ route('departmentsList') }}">Відділи</a>
                        <a class="dropdown-item" href="{{ route('divisionsList') }}">Підрозділи</a>
                        <a class="dropdown-item" href="{{ route('positionsList') }}">Посади</a>
                        <a class="dropdown-item" href="{{ route('workersList') }}">Працівники</a>
                        <a class="dropdown-item" href="{{ route('drillsTypesList') }}">Типи бурових</a>
                        <a class="dropdown-item" href="{{ route('vpnStatusesList') }}">Статуси vpn</a>
                        <a class="dropdown-item" href="{{ route('dataGroupStatusesList') }}">Статуси інтернету</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}">Адміністрування</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('test') }}">ТЕСТ</a>
                </li>
            </ul>
            
            <div class="row justify-content-end">
                <div class="col-sm-2 text-right">
                    <a href="/user/login">Вхід</a>
                </div>
            </div>

            @yield('content')
     
    </div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/tableFilter.js') }}"></script>
    <script src="{{ asset('js/select.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>