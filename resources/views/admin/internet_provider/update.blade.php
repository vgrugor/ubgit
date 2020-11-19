@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col text-center">
            <h1>Редагування інформації про провайдера интернету</h1>
            <br>
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
            <form method="post" action="{{ route('internetProviderSave', $internetProvider->id) }}">
                <div class="form-group">
                    <label for="name">Назва</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="" value="{{ $internetProvider->name }}">
                </div>
                <div class="form-group">
                    <label for="order_by">Порядок сортування</label>
                    <input type="text" name="order_by" class="form-control" id="order_by" placeholder="" value="{{ $internetProvider->order_by }}">
                </div>
                <div class="form-group">
                    <label for="note">Примітка</label>
                    <textarea name="note" class="form-control" id="note">{{ $internetProvider->note }}</textarea>
                </div>
                <div class="form-group text-right">
                    <a href="{{ route('adminInternetProvidersList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                    <input type="submit" name="submit" value="Зберегти" class="btn btn-primary" role="button">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
