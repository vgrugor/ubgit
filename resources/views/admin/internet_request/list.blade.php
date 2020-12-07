@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Керування заявками на інтернет</h1>
            <br/>
            <p class="text-right">
                <a href="{{ route('internetRequestAdd') }}">
                    <i class="fas fa-plus-circle"></i>
                    Додати заявку на інтернет
                </a>
            </p>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Свердловина</th>
                        <th scope="col">Провайдер</th>
                        <th scope="col">Тип заявки</th>
                        <th scope="col">Дата відправки заявки</th>
                        <th scope="col">Дата заявки</th>
                        <th scope="col">Заявка закрита</th>
                        <th scope="col">Дата закриття заявки</th>
                        <th scope="col">Примітка</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach ($internetRequestsList as $internetRequestItem)
                        <tr>
                            <td>{{ $internetRequestItem->id }}</td>
                            <td>{{ $internetRequestItem->point }}</td>
                            <td>{{ $internetRequestItem->provider }}</td>
                            <td>{{ $internetRequestItem->type }}</td>
                            <td>{{ $internetRequestItem->date_send > 0 ? date("d.m.Y", strtotime($internetRequestItem->date_send)) : '-' }}</td>
                            <td>{{ $internetRequestItem->date_request > 0 ? date("d.m.Y", strtotime($internetRequestItem->date_request)) : '-' }}</td>
                            <td>
                                @if($internetRequestItem->is_completed)
                                    <div class="alert alert-success" role="alert">
                                        Так
                                    </div>
                                @else
                                    <div class="alert alert-danger" role="alert">
                                        Ні
                                    </div>
                                @endif
                            </td>
                            <td>{{ $internetRequestItem->date_completion > 0 ? date("d.m.Y", strtotime($internetRequestItem->date_completion)) : '-' }}</td>
                            <td>{{ $internetRequestItem->note }}</td>
                            <td>
                                <a href="{{ route('internetRequestUpdate', $internetRequestItem->id) }}" title="Редагувати"><i class="far fa-edit"></i></a>
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
