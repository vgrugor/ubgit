@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Довідник колон автомобільної техніки</h1>
            <br/>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Назва</th>
                    <th scope="col">Адреса</th>
                    <th scope="col">Примітка</th>
                </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach($motorcadesList as $motorcadeItem)
                        <tr>
                            <td>{{ $motorcadeItem->name }}</td>
                            <td>{{ $motorcadeItem->address }}</td>
                            <td>{{ $motorcadeItem->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection