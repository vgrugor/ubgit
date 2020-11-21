@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col text-center">
            <h1>Редагування заявки на інтернет</h1>
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
            <form method="post" action="{{ route('internetRequestSave', $internetRequest->id) }}">
                <div class="form-group">
                    <label for="point_id">Свердловина</label>
                    <select name="point_id" class="form-control" id="point_id">
                        <option value="">не обрано</option>
                        @foreach($pointsList as $pointItem)
                            <option value="{{ $pointItem->id }}" {{ $pointItem->id == $internetRequest->point_id ? 'selected' : '' }}>{{ $pointItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="internet_provider_id">Провайдер</label>
                    <select name="internet_provider_id" class="form-control" id="internet_provider_id">
                        <option value="">не обрано</option>
                        @foreach($internetProvidersList as $internetProviderItem)
                            <option value="{{ $internetProviderItem->id }}" {{ $internetProviderItem->id == $internetRequest->internet_provider_id ? 'selected' : '' }}>{{ $internetProviderItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="internet_request_type_id">Тип заявки</label>
                    <select name="internet_request_type_id" class="form-control" id="internet_request_type_id">
                        <option value="">не обрано</option>
                        @foreach($internetRequestTypesList as $internetRequestTypeItem)
                            <option value="{{ $internetRequestTypeItem->id }}" {{ $internetRequestTypeItem->id == $internetRequest->internet_request_type_id ? 'selected' : '' }}>{{ $internetRequestTypeItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_send">Дата відправлення заявки</label>
                    <input type="date" name="date_send" value="{{ $internetRequest->date_send }}" id="date_send" class="form-control">
                </div>
                <div class="form-group">
                    <label for="date_request">Дата в заявці</label>
                    <input type="date" name="date_request" value="{{ $internetRequest->date_request }}" id="date_request" class="form-control">
                </div>

                <div class="form-group">
                    <label for="date_completion">Дата виконання заявки</label>
                    <input type="date" name="date_completion" value="{{ $internetRequest->date_completion }}" id="date_completion" class="form-control">
                </div>
                <div class="form-group">
                    <label for="is_completed">Стан виконання</label>
                    <select name="is_completed" class="form-control" id="is_completed">
                        <option value="0" {{ $internetRequest->is_completed == 0 ? 'selected' : '' }}>Не закрита</option>
                        <option value="1" {{ $internetRequest->is_completed == 1 ? 'selected' : '' }}>Закрита</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="note">Примітка</label>
                    <textarea name="note" class="form-control" id="note">{{ $internetRequest->note }}</textarea>
                </div>
                <div class="form-group text-right">
                    <a href="{{ route('adminInternetRequestTypesList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                    <input type="submit" name="submit" value="Зберегти" class="btn btn-primary" role="button">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
