@extends('layouts.site')

@section('content')
<table>
    <tr>
        <th>id</th>
        <th>Назва</th>
        <th>Номер</th>
    </tr>
    @foreach ($drills as $drill)

        <tr>
            <td>{{ $drill->id }}</td>
            <td>{{ $drill->name }}</td>
            <td>{{ $drill->number }}</td>
        </tr>

    @endforeach
</table>
@endsection