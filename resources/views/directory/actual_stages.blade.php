@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Довідник фактичних стадій буріння</h1>
            <br/>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Назва</th>
                </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach($actualStagesList as $actualStageItem)
                        <tr>
                            <td>{{ $actualStageItem->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection