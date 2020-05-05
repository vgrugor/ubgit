@extends('layouts.site')

@section('content')
<!--Создание нового подразделения-->
    <div class="row">
        <div class="col">
            <h1 class="text-center">Редагувати підрозділ</h1>
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
            <form method="post" action="{{ route('divisionSave', $division->id) }}">
                <div class="form-group">
                    <label for="organization_id">Оберіть організацію</label>
                    <select name="organization_id" class="form-control" id="organization_id" onchange="getDepartments()">
                        <option value="">не обрано</option>
                        @foreach($organizationsList as $organizationItem)
                            <option value="{{ $organizationItem->id }}" {{ $organizationItem->id == $division->organization_id ? 'selected' : '' }}>{{ $organizationItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="department_id">Оберіть відділ</label>
                    <select name="department_id" class="form-control" id="department_id">
                        <option value="">не обрано</option>
                        @foreach($departmentsList as $departmentItem)
                            <option value="{{ $departmentItem->id }}" {{ $departmentItem->id == $division->department_id ? 'selected' : '' }}>{{ $departmentItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Введіть назву підрозділу</label>
                    <input type="text" name="name" value="{{ $division->name }}" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="note">Примітка</label>
                    <textarea name="note" class="form-control" id="note">{{ $division->note }}</textarea>
                </div>
                <div class="form-group text-right">
                    <a href="{{ route('adminDivisionsList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                    <input type="submit" name="submit" value="Зберегти" class="btn btn-primary" role="button">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection