@extends('layouts.site')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <h1 class="text-center">Звільнення працівника</h1>
            <br/>
            <p>
                Ви дійсно бажаєте звільнити працівника <strong>{{ $worker->name }}</strong> 
                з посади <strong>{{ $position->name }}</strong>?
            </p>
            <div class="text-center">
                <a href="{{ route('adminWorkersList') }}" class="btn btn-secondary" role="button">Відмінити</a>
                <a href="{{ route('removeWorker', $worker->id) }}" role='button' class="btn btn-danger">Видалити</a>
            </div>
        </div>
    </div>
@endsection