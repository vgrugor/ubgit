@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Керування типами заявок на інтернет</h1>
            <br/>
            <p class="text-right">
                <a href="{{ route('internetRequestTypeAdd') }}">
                    <i class="fas fa-plus-circle"></i>
                    Додати тип заявки на інтернет
                </a>
            </p>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Назва</th>
                        <th scope="col">Примітка</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach ($internetRequestTypesList as $internetRequestTypeItem)
                        <tr>
                            <td>{{ $internetRequestTypeItem->id }}</td>
                            <td>{{ $internetRequestTypeItem->name }}</td>
                            <td>{{ $internetRequestTypeItem->note }}</td>
                            <td>
                                <a href="{{ route('internetRequestTypeUpdate', $internetRequestTypeItem->id) }}" title="Редагувати"><i class="far fa-edit"></i></a>
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
