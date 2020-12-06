@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col text-center">
            <h1>Додавання відеонагляду на бурову</h1>
            <br>
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
            <form method="post" action="{{ route('videoSurveillanceStore') }}">
                <div class="form-group">
                    <label for="point_id">Свердловина</label>
                    <select name="point_id" class="form-control" id="point_id">
                        <option value="">не обрано</option>
                        @foreach($pointsList as $pointItem)
                            <option value="{{ $pointItem->id }}">{{ $pointItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_installation">Дата інсталяції</label>
                    <input type="date" name="date_installation" value="" id="date_installation" class="form-control">
                </div>
                <div class="form-group">
                    <label for="date_demount">Дата демонтажу</label>
                    <input type="date" name="date_demount" value="" id="date_demount" class="form-control">
                </div>
                <div class="form-group">
                    <label for="note">Примітка</label>
                    <textarea name="note" class="form-control" id="note"></textarea>
                </div>
                <div class="form-group text-right">
                    <a href="{{ route('adminVideoSurveillancesList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                    <input type="submit" name="submit" value="Додати" class="btn btn-success">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection