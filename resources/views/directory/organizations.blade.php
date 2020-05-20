@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Довідник організацій</h1>
            <br/>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Назва</th>
                    <th scope="col">Тип</th>
                    <th scope="col">Адреса</th>
                    <th scope="col">Примітка</th>
                </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach($organizationsList as $organizationItem)
                        <tr>
                            <td>{{ $organizationItem->name }}</td>
                            <td>{{ $organizationItem->type }}</td>
                            <td>{{ $organizationItem->address }}</td>
                            <td>{{ $organizationItem->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection