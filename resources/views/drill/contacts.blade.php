@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Контакти</h1>
            <br/>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Бурова</th>
                        <th scope="col">Свердловина</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">email</th>
                        <th scope="col">Адреса</th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach ($drillsList as $drillItem)
                        <tr>
                            <td>{{ $drillItem->drill }}</td>
                            <td>{{ $drillItem->point }}</td>
                            <td>{{ $drillItem->phone_number }}</td>
                            <td>
                                <a href="mailto:{{ $drillItem->email }}">
                                    {{ $drillItem->email }}
                                </a>
                            </td>
                            <td>{{ $drillItem->address }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection