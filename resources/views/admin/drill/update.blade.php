@extends('layouts.site')

@section('content')
    
    <div class="row">
        <div class="col">
            <h1 class="text-center">Редагувати інформацію про буровий верстат</h1>
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
            <form method="post" action="{{ route('drillSave', $drill->id) }}">
                <div class="form-group">
                    <label for="name">Введіть назву бурової за класиіфкацією БУ "Укрбургаз"</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $drill->name }}">
                </div>
                <div class="form-group">
                    <label for="germany_name">Введіть назву бурової за класиіфкацією Bentec</label>
                    <input type="text" name="germany_name" id="germany_name" class="form-control" value="{{ $drill->germany_name }}">
                </div>
                <div class="form-group">
                    <label for="drill_type_id">Вкажіть тип бурової</label>
                    <select name="drill_type_id" id="drill_type_id" class="form-control">
                        <option value="">Не вказано</option>
                        @foreach($drillTypesList as $drillTypeItem)
                            <option value="{{ $drillTypeItem->id }}" {{ $drillTypeItem->id == $drill->drill_type_id ? 'selected' : '' }}>{{ $drillTypeItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="workers_transfer">Бурову бригаду переведено до</label>
                    <select name="workers_transfer" id="workers_transfer" class="form-control">
                        <option value="0">Не вказано</option>
                        @foreach($pointsList as $pointItem)
                            <option value="{{ $pointItem->id }}" {{ $pointItem->id == $drill->workers_transfer ? 'selected' : '' }}>{{ $pointItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone_number">Номер телефону в форматі (ХХХ)ХХХ-ХХ-ХХ</label>
                    <input type="text" name="phone_number" value="{{ $drill->phone_number }}" id="phone_number" class="form-control" placeholder="(XXX)XXX-XX-XX">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" value="{{ $drill->email }}" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="note">Примітка</label>
                    <textarea name="note" class="form-control" id="note">{{ $drill->note }}</textarea>
                </div>
                <div class="form-group text-right">
                    <a href="{{ route('adminDrillsList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                    <input type="submit" name="submit" value="Зберегти" class="btn btn-primary" role="button">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection