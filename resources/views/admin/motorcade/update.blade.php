@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col text-center">
            <h1>Редагувати колону автомобільної техніки</h1>
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
            <form method="post" action="{{ route('motorcadeSave', $motorcade->id) }}">
                <div class="form-group">
                    <label for="name">Назва колони автомобільної техніки</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $motorcade->name }}">
                </div>
                <div class="form-group">
                    <label for="address">Вкажіть адресу</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $motorcade->address }}">
                </div>
                <div class="form-group">
                    <label for="note">Примітка</label>
                    <textarea name="note" id="note" class="form-control">{{ $motorcade->note }}</textarea>
                </div>
                <div class="form-group text-right">
                    <a href="{{ route('adminMotorcadesList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                    <input type="submit" name="submit" value="Зберегти" class="btn btn-primary" role="button">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection