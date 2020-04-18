@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col text-center">
            <h1>Додати нову організацію</h1>
            <br/>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <form method="post" action="{{ route('organizationStore') }}">
                <div class="form-group">
                    <label for="name">Введіть назву організації</label>
                    <input type="text" name="name" id="name" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="address">Вкажіть адресу</label>
                    <input type="text" name="address" id="address" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="note">Примітка</label>
                    <textarea name="note" id="note" class="form-control"></textarea>
                </div>
                <input type="submit" name="submit" value="Додати" class="btn btn-success" role="button">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection