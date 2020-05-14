@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Керування колонами автомобільної техніки</h1>
            <br/>
            <p class="text-right">
                <a href="#">
                    <i class="fas fa-plus-circle"></i>
                    Додати колону автомобільної техніки
                </a>
            </p>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Назва</th>
                    <th scope="col">Адреса</th>
                    <th scope="col">Примітка</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach($motorcadesList as $motorcadeItem)
                        <tr>
                            <td>{{ $motorcadeItem->name }}</td>
                            <td>{{ $motorcadeItem->address }}</td>
                            <td>{{ $motorcadeItem->note }}</td>
                            <td>
                                <a href="#" title="Редагувати"><i class="far fa-edit"></i></a>
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