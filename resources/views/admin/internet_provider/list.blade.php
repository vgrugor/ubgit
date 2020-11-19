@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Керування провайдерами інтернету</h1>
            <br/>
            <p class="text-right">
                <a href="{{ route('internetProviderAdd') }}">
                    <i class="fas fa-plus-circle"></i>
                    Додати провайдера інтернету
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
                    @foreach ($internetProvidersList as $internetProviderItem)
                        <tr>
                            <td>{{ $internetProviderItem->id }}</td>
                            <td>{{ $internetProviderItem->name }}</td>
                            <td>{{ $internetProviderItem->note }}</td>
                            <td>
                                <a href="{{ route('internetProviderUpdate', $internetProviderItem->id) }}" title="Редагувати"><i class="far fa-edit"></i></a>
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
