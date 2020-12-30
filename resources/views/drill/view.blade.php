@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-sm-10">
            </br>
            <h1>
                {{ $drill->drill }}
                @if($drill->workers_transfer)
                    ({{ $drill->workers_transfer }})
                @endif
            </h1>
        </div>
        <div class="col-sm-2 text-right">
            <a href="#" title="Редагувати" alt="Редагувати"><i class="far fa-edit"></i></a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Тип:</strong></p>
        </div>
        <div class="col">
            {{ $drill->drill_type }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Код за класифікацією Bentec:</strong></p>
        </div>
        <div class="col">
            {{ $drill->germany_name }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Місцезнаходження бурової бригади:</strong></p>
        </div>
        <div class="col">
            @if($drill->point_id)
                <a href="{{ route('viewPoint', ['id' => $drill->point_id]) }}">{{ $drill->workers_transfer }}</a>
            @else
                -
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Телефон:</strong></p>
        </div>
        <div class="col">
            {{ $drill->phone_number }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>email:</strong></p>
        </div>
        <div class="col">
            {{ $drill->email }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Примітка:</strong></p>
        </div>
        <div class="col">
            {{ $drill->note }}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Історія переміщень бурового верстата:</strong></p>
        </div>
        <div class="col">
            @foreach($historyList as $historyItem)
                <div><a href="{{ route('viewPoint', ['id' => $historyItem->id]) }}">{{ $historyItem->name }}</a></div>
            @endforeach
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Склад бурової бригади:</strong></p>
        </div>
        <div class="col">
            @foreach($workersList as $workerItem)
                <div class="row">
                    <div class="col-sm-4">
                        {{ $workerItem->position }}
                    </div>
                    <div class="col-sm-5">
                        <a href="{{ route('viewWorker', $workerItem->id) }}">{{ $workerItem->worker }}</a>
                    </div>
                    <div class="col-sm-3">
                        {{ $workerItem->phone_number }}
                        @if($workerItem->phone_number2)
                            {{ $workerItem->phone_number2 }}
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
