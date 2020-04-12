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
            <form method="post" action="{{ route('workerStore') }}">
                <div class="form-group">
                    <label for="organization_id">Оберіть організацію</label>
                    <select name="organization_id" class="form-control" id="organization_id">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="department_id">Оберіть відділ</label>
                    <select name="department_id" class="form-control" id="department_id">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="division_id">Оберіть підрозділ</label>
                    <select name="division_id" class="form-control" id="division_id">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="position_id">Оберіть посаду</label>
                    <select name="position_id" class="form-control" id="position_id">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="drill_id">Оберіть свердловину</label>
                    <select name="drill_id" class="form-control" id="drill_id">
                        
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
                    <label for="email">email</label>
                    <input type="email" name="email" value="" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="vpn_status_id">Стан VPN</label>
                    <select name="vpn_status_id" class="form-control" id="vpn_status_id">
                        
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
                <div class="form-group">
                    <input type="submit" name="submit" value="Додати" class="btn btn-success" role="button">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection