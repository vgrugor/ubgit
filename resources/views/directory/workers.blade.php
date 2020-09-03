@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Довідник працівників</h1>
            <!---------------------------------------------------Поиск---------------------------------------------------->
            <div class="row">
                <div class="col-sm-8">
                </div>
                <div class="col-sm-4">
                    <input class="form-control" id="search" type="text" placeholder="Пошук...">
                </div>
            </div>
            <!------------------------------------------------------------------------------------------------------------->
            <br/>
            
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ПІБ</th>
                    <th scope="col">Акаунт в AD</th>
                    @auth
                        <th scope="col">Телефон</th>
                    @endauth
                    <th scope="col">email</th>
                    <th scope="col">vpn</th>
                    <th scope="col">Примітка</th>
                </tr>
                </thead>
                <tbody class="table-striped" id="tableForSearch">
                    @foreach($workersList as $workerItem)
                        <tr>
                            <td>
                                <a href="{{ route('viewWorker', ['id' => $workerItem->id])}}">{{ $workerItem->name }}</a>
                            </td>
                            <td>
                                {{ $workerItem->account_ad }}
                            </td>
                            @auth
                                <td class="text-nowrap">
                                    {{ $workerItem->phone_number }} <br> 
                                    {{ $workerItem->phone_number2 }}
                                </td>
                            @endauth
                            <td>
                                <a href="mailto:{{ $workerItem->email }}">
                                    {{ $workerItem->email }}
                                </a>
                            </td>
                            <td class="text-nowrap">
                                {{ $workerItem->vpn }}
                            </td>
                            <td>
                                {{ $workerItem->note }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection