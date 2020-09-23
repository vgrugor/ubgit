@extends('layouts.site')

@section('content')
<div class="row">
    <div class="col text-center">
        <h1>Додавання нового статусу для VPN</h1>
        <br>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6">
        
        <form method="post" action="{{ route('vpnStatusStore') }}">
            <div class="form-group">
                <label for="name">Введіть назву нового статуса для VPN</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="" value="">
            </div>
            <div class="form-group text-right">
                <a href="{{ route('adminVpnStatusesList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                <input type="submit" name="submit" value="Додати" class="btn btn-success">
            </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection