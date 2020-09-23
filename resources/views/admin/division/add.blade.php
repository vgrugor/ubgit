@extends('layouts.site')

@section('content')
<!--Создание нового подразделения-->
    <div class="row">
        <div class="col">
            <h1 class="text-center">Додати новий підрозділ</h1>
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
            <form method="post" action="{{ route('divisionStore') }}">
                <div class="form-group">
                    <label for="organization_id">Оберіть організацію</label>
                    <a href="{{ route('organizationAdd') }}" title="Додати посаду" target="_blank"><i class="far fa-plus-square"></i></a>
                    <select name="organization_id" class="form-control" id="organization_id" onchange="getDepartments()">
                        <option value="">не обрано</option>
                        @foreach($organizationsList as $organizationItem)
                            <option value="{{ $organizationItem->id }}">{{ $organizationItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="department_id">Оберіть відділ</label>
                    <a href="{{ route('departmentAdd') }}" title="Додати посаду" target="_blank"><i class="far fa-plus-square"></i></a>
                    <select name="department_id" class="form-control" id="department_id">
                        <option value="">не обрано</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Введіть назву підрозділу</label>
                    <input type="text" name="name" value="" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="note">Примітка</label>
                    <textarea name="note" class="form-control" id="note"></textarea>
                </div>
                <div class="form-group text-right">
                    <a href="{{ route('adminDivisionsList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                    <input type="submit" name="submit" value="Додати" class="btn btn-success" role="button">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection