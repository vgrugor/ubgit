@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Килим буріння</h1>
            <br/>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Бурова</th>
                        <th scope="col">Етап</th>
                        <th scope="col">Дата початку монтажу</th>
                        <th scope="col">Дата початку буріння</th>
                        <th scope="col">Дата початку демонтажу</th>
                        <th scope="col">Дата передачі в експлуатацію</th>
                        <th scope="col">Дата оновлення інформації</th>
                        <th scope="col">Примітка</th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach ($drillsList as $drillItem)
                        <tr>
                            <td>{{ $drillItem->drill }}</td>
                            <td>{{ $drillItem->actual_stage }}</td>
                            <td>{{ date('d.m.Y',strtotime($drillItem->date_building)) }}</td>
                            <td>{{ date('d.m.Y',strtotime($drillItem->date_drilling)) }}</td>
                            <td>{{ date('d.m.Y',strtotime($drillItem->date_demount)) }}</td>
                            <td>{{ date('d.m.Y',strtotime($drillItem->date_transfer)) }}</td>
                            <td>{{ date('d.m.Y',strtotime($drillItem->date_refresh)) }}</td>
                            <td>{{ $drillItem->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection