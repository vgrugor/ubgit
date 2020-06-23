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
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('organizationStore') }}">
                <div class="form-group">
                    <label for="name">Введіть назву організації</label>
                    <input type="text" name="name" id="name" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="type">Оберіть тип організації</label>
                    <select name="type" class="form-control" id="type">
                        <option value="0">не обрано</option>
                        @foreach ($organizationTypesList as $organizationTypeItem)
                            <option value="{{ $organizationTypeItem->id }}" >{{ $organizationTypeItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Вкажіть адресу</label>
                    <input type="text" name="address" id="address" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="prefix">Префікс (UBG_)</label>
                    <input type="text" name="prefix" id="prefix" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="add_ad">Додати ПК в AD (скрипт PowerShell)</label>
                    <textarea name="add_ad" id="add_ad" class="form-control"></textarea>
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