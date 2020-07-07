@extends('layouts.site')

@section('content')
    
    <div class="row">
        <div class="col text-center">
            <h1>Додати нову посаду</h1>
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
            <form method="post" action="{{ route('positionStore') }}">
                <div class="form-group">
                    <label for="organization_id">Оберіть організацію</label>
                    <a href="{{ route('organizationAdd') }}" title="Додати посаду" target="_blank"><i class="far fa-plus-square"></i></a>
                    <select name="organization_id" class="form-control" id="organization_id"  onchange="getDepartments()">
                        <option value="">не обрано</option>
                        @foreach($organizationsList as $organizationItem)
                            <option value="{{ $organizationItem->id }}">{{ $organizationItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="department_id">Оберіть відділ</label>
                    <a href="{{ route('departmentAdd') }}" title="Додати посаду" target="_blank"><i class="far fa-plus-square"></i></a>
                    <select name="department_id" class="form-control" id="department_id" onchange="getDivisions()">
                        <option value="">не обрано</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="division_id">Оберіть підрозділ</label>
                    <a href="{{ route('divisionAdd') }}" title="Додати посаду" target="_blank"><i class="far fa-plus-square"></i></a>
                    <select name="division_id" class="form-control" id="division_id">
                        <option value="0">не обрано</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Введіть назву посади</label>
                    <input type="text" name="name" value="" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="location_id">Розташування робочого місця</label>
                    <select name="location_id" class="form-control" id="location_id">
                        <option value="0">не обрано</option>
                        @foreach ($locationsList as $locationItem)
                            <option value="{{ $locationItem->id }}">
                                {{ $locationItem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group text-right">
                    <a href="{{ route('adminPositionsList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                    <input type="submit" name="submit" value="Додати" role="button" class="btn btn-success">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection