@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Керування відділами</h1>
            <br/>
            <p class="text-right">
                <a href="{{ route('departmentAdd') }}">
                    <i class="fas fa-plus-circle"></i>
                    Додати відділ
                </a>
            </p>
            <!---------------------------------------------------Поиск---------------------------------------------------->
            <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <select class="form-control" id="selectOrganization">
                                    <option value="">Всі організації</option>
                                    @foreach ($organizationsList as $organizationItem)
                                        <option>{{ $organizationItem->name }}</option>
                                    @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" id="search" type="text" placeholder="Пошук...">
                        </div>
                    </div>
            <!------------------------------------------------------------------------------------------------------------->
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Організація</th>
                    <th scope="col">Назва</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Примітка</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="table-striped" id="tableForSearch">
                    @foreach($departmentsList as $departmentItem)
                        <tr>
                            <td>{{ $departmentItem->organization }}</td>
                            <td>{{ $departmentItem->name }}</td>
                            <td>{{ $departmentItem->phone_number }}</td>
                            <td>{{ $departmentItem->note }}</td>
                            <td>
                                <a href="{{ route('departmentUpdate', $departmentItem->id) }}" title="Редагувати"><i class="far fa-edit"></i></a>
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