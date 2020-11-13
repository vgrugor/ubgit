@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col text-center">
            <h1>Додати працівника</h1>
            <br/>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('workerStore') }}">
                <div class="form-group">
                    <label for="organization_id">Оберіть організацію</label>
                    <a href="{{ route('organizationAdd') }}" title="Додати організацію" target="_blank"><i class="far fa-plus-square"></i></a>
                    <select name="organization_id" class="form-control" id="organization_id" onchange="getDepartments()">
                        <option value="">не обрано</option>
                        @foreach($organizationsList as $organizationItem)
                            <option value="{{ $organizationItem->id }}">{{ $organizationItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="department_id">Оберіть відділ</label>
                    <a href="{{ route('departmentAdd') }}" title="Додати відділ" target="_blank"><i class="far fa-plus-square"></i></a>
                    <select name="department_id" class="form-control" id="department_id" onchange="getDivisions()">
                        <option value="">не обрано</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="division_id">Оберіть підрозділ</label>
                    <a href="{{ route('divisionAdd') }}" title="Додати підрозділ" target="_blank"><i class="far fa-plus-square"></i></a>
                    <select name="division_id" class="form-control" id="division_id" onchange="getPositions()">
                        <option value="0">не обрано</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="position_id">Оберіть посаду</label>
                    <a href="{{ route('positionAdd') }}" title="Додати посаду" target="_blank"><i class="far fa-plus-square"></i></a>
                    <select name="position_id" class="form-control" id="position_id">
                        <option value="">не обрано</option>
                    </select>
                </div>
                <div class="form-group d-none" id="drill_form">
                    <label for="drill_id">Оберіть свердловину</label>
                    <select name="drill_id" class="form-control" id="drill_id">
                        <option value="0">не обрано</option>
                        @foreach($drillsList as $drillItem)
                            <option value="{{ $drillItem->id }}">{{ $drillItem->point }} - {{ $drillItem->drill }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group d-none" id="motorcade_form">
                    <label for="motorcade_id">Оберіть колону автомобільної техніки</label>
                    <select name="motorcade_id" class="form-control" id="motorcade_id">
                        <option value="0">не обрано</option>
                        @foreach($motorcadesList as $motorcadeItem)
                            <option value="{{ $motorcadeItem->id }}">{{ $motorcadeItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Прізвище Ім'я Побатькові</label>
                    <input type="text" name="name" value="" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="account_ad">Акаунт в AD</label>
                    <input type="text" name="account_ad" value="" id="account_ad" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone_number">Номер телефону в форматі (XXX)XXX-XX-XX</label>
                    <input type="text" name="phone_number" value="" id="phone_number" class="form-control" placeholder="(XXX)XXX-XX-XX">
                </div>
                <div class="form-group">
                    <label for="phone_number2">Номер телефону в форматі (XXX)XXX-XX-XX</label>
                    <input type="text" name="phone_number2" value="" id="phone_number2" class="form-control" placeholder="(XXX)XXX-XX-XX">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" value="" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="vpn_status_id">Стан VPN</label>
                    <select name="vpn_status_id" class="form-control" id="vpn_status_id">
                        @foreach ($vpnsList as $vpnItem)
                            <option value="{{ $vpnItem->id }}">{{ $vpnItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_refresh">Дата оновлення інформації</label>
                    <input type="date" name="date_refresh" value="" id="date_refresh" class="form-control">
                </div>
                <div class="form-group">
                    <label for="note">Примітка</label>
                    <textarea name="note" class="form-control" id="note"></textarea>
                </div>
                <div class="form-group text-right">
                    <a href="{{ route('adminWorkersList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                    <input type="submit" name="submit" value="Додати" class="btn btn-success" role="button">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection