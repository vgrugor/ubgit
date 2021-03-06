@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col text-center">
            <h1>Редагувати відділ</h1>
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
            <form method="post" action="{{ route('departmentSave', $department->id) }}">
                <div class="form-group">
                    <label for="organization_id">Оберіть потрібну організацію</label>
                    <select id="organization_id" name="organization_id" class="form-control">
                        <option value="">не обрано</option>
                        @foreach($organizationsList as $organizationItem)
                            <option value="{{ $organizationItem->id }}" {{ $organizationItem->id == $department->organization_id ? "selected" : '' }} >{{ $organizationItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Введіть назву відділу</label>
                    <input type="text" name="name" id="name" value="{{ $department->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone_number">Вкажіть номер телефону</label>
                    <input type="text" name="phone_number" id="phone_number" value="{{ $department->phone_number }}" class="form-control" placeholder="(XXX)XXX-XX-XX">
                </div>
                <div class="form-group">
                    <label for="note">Примітка</label>
                    <textarea name="note" id="note" class="form-control">{{ $department->note }}</textarea>
                </div>
                <div class="form-group text-right">
                    <a href="{{ route('adminDepartmentsList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                    <input type="submit" name="submit" value="Зберегти" class="btn btn-primary" role="button">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection