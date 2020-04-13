@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-center">Додати новий підрозділ</h1>
            <br/>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <form method="post" action="{{ route('') }}">
                <div class="form-group">
                    <label for="organization_id">Оберіть організацію</label>
                    <select name="organization_id" class="form-control" id="organization_id">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="department_id">Оберіть відділ</label>
                    <select name="department_id" class="form-control" id="department_id">
                        
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
                <div class="form-group">
                    <input type="submit" name="submit" value="Додати" class="btn btn-success" role="button">
                </div>
            </form>
        </div>
    </div>
@endsection