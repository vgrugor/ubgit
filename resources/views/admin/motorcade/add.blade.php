@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col text-center">
            <h1>Додати нову колону автомобільної техніки</h1>
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
            <form method="post" action="{{ route('motorcadeStore') }}">
                <div class="form-group">
                    <label for="name">Введіть назву колони автомобільної техніки</label>
                    <input type="text" name="name" id="name" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="address">Вкажіть адресу</label>
                    <input type="text" name="address" id="address" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="note">Примітка</label>
                    <textarea name="note" id="note" class="form-control"></textarea>
                </div>
                <div class="form-group text-right">
                    <a href="{{ route('adminMotorcadesList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                    <input type="submit" name="submit" value="Додати" class="btn btn-success" role="button">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection