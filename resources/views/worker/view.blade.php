@extends('layouts.site')

@section('content')
    @if ($worker)
        {{ $worker->name }}
    @endif
@endsection