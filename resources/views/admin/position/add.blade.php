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
                    <select name="organization_id" class="form-control" id="organization_id"  onchange="getDepartments()">
                        <option value="">не обрано</option>
                        @foreach($organizationsList as $organizationItem)
                            <option value="{{ $organizationItem->id }}">{{ $organizationItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="department_id">Оберіть відділ</label>
                    <select name="department_id" class="form-control" id="department_id" onchange="getDivisions()">
                        <option value="">не обрано</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="division_id">Оберіть підрозділ</label>
                    <select name="division_id" class="form-control" id="division_id">
                        <option value="0">не обрано</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Введіть назву посади</label>
                    <input type="text" name="name" value="" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Додати" role="button" class="btn btn-success">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection