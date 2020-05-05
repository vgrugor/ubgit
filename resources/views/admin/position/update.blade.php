@extends('layouts.site')

@section('content')
    
    <div class="row">
        <div class="col text-center">
            <h1>Редагувати посаду</h1>
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
            <form method="post" action="{{ route('positionSave', $position->id) }}">
                <div class="form-group">
                    <label for="organization_id">Організація</label>
                    <select name="organization_id" class="form-control" id="organization_id"  onchange="getDepartments()">
                        <option value="">не обрано</option>
                        @foreach($organizationsList as $organizationItem)
                            <option value="{{ $organizationItem->id }}" {{ $organizationItem->id == $position->organization_id ? 'selected' : '' }}>
                                {{ $organizationItem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="department_id">Відділ</label>
                    <select name="department_id" class="form-control" id="department_id" onchange="getDivisions()">
                        <option value="">не обрано</option>
                        @foreach ($departmentsList as $departmentItem)
                            <option value="{{ $departmentItem->id }}" {{ $departmentItem->id == $position->department_id ? 'selected' : '' }}>
                                {{ $departmentItem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="division_id">Підрозділ</label>
                    <select name="division_id" class="form-control" id="division_id">
                        <option value="0">не обрано</option>
                        @foreach ($divisionsList as $divisionItem)
                            <option value="{{ $divisionItem->id }}" {{ $divisionItem->id == $position->division_id ? 'selected' : '' }}>
                                {{ $divisionItem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Назва посади</label>
                    <input type="text" name="name" value="{{ $position->name }}" class="form-control" id="name">
                </div>
                <div class="form-group text-right">
                    <a href="{{ route('adminPositionsList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                    <input type="submit" name="submit" value="Зберегти" class="btn btn-primary" role="button">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection