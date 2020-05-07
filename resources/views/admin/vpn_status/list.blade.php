@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Керування статусами VPN</h1>
            <br/>
            <p class="text-right">
                <a href="{{ route('vpnStatusAdd') }}">
                    <i class="fas fa-plus-circle"></i>
                    Додати статус
                </a>
            </p>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Назва</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach($vpnStatusesList as $vpnStatusItem)
                        <tr>
                            <td>{{ $vpnStatusItem->name }}</td>
                            <td>
                                <a href="{{ route('vpnStatusUpdate', $vpnStatusItem->id) }}" title="Редагувати"><i class="far fa-edit"></i></a>
                            </td>
                            <td>
                                <a href="#" title="Видалити"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection