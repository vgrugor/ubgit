@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Килим буріння</h1>
            <br/>
            <p>*Попереджувати про зміну статусу буріння за {{ $days['before'] }} днів до та за {{ $days['after'] }} днів після дати зміни</p>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Верстат</th>
                        <th scope="col">Свердловина</th>
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
                    @foreach ($pointsList as $pointItem)
                        <tr 
                            @if(!$pointItem->is_actual)
                                class="alert alert-secondary"
                            @else
                                class="alert alert-success"
                            @endif
                        >
                            <td><a href="{{ route('viewDrill', ['id' => $pointItem->drill_id]) }}">{{ $pointItem->drill }}</a></td>
                            <td><a href="{{ route('viewPoint', ['id' => $pointItem->point_id]) }}">{{ $pointItem->point }}</a></td>
                            <td>
                            </td>
                            <td 
                                @if ((strtotime("+{$days['after']} day") > strtotime($pointItem->date_building)) && (strtotime("-{$days['before']} day") < strtotime($pointItem->date_building)))
                                    class="alert alert-danger"
                                @elseif(date('Y-m-d') > $pointItem->date_building) 
                                    class="alert alert-secondary"
                                @else 
                                    class="alert alert-success" 
                                @endif
                            >
                                {{ $pointItem->date_building > 0 ? date("d.m.Y", strtotime($pointItem->date_building)) : '-' }}
                            </td>
                            <td 
                                @if ((strtotime("+{$days['after']} day") > strtotime($pointItem->date_drilling)) && (strtotime("-{$days['before']} day") < strtotime($pointItem->date_drilling)))
                                    class="alert alert-danger"
                                @elseif(date('Y-m-d') > $pointItem->date_drilling) 
                                    class="alert alert-secondary"
                                @else 
                                    class="alert alert-success" 
                                @endif
                            >   
                                {{ $pointItem->date_drilling > 0 ? date("d.m.Y", strtotime($pointItem->date_drilling)) : '-' }}
                            </td>
                            <td 
                                @if ((strtotime("+{$days['after']} day") > strtotime($pointItem->date_demount)) && (strtotime("-{$days['before']} day") < strtotime($pointItem->date_demount)))
                                    class="alert alert-danger"
                                @elseif(date('Y-m-d') > $pointItem->date_demount) 
                                    class="alert alert-secondary"
                                @else 
                                    class="alert alert-success" 
                                @endif
                            >
                                {{ $pointItem->date_demount > 0 ? date("d.m.Y", strtotime($pointItem->date_demount)) : '-' }}
                            </td>
                            <td 
                                @if ((strtotime("+{$days['after']} day") > strtotime($pointItem->date_transfer)) && (strtotime("-{$days['before']} day") < strtotime($pointItem->date_transfer)))
                                    class="alert alert-danger"
                                @elseif(date('Y-m-d') > $pointItem->date_transfer) 
                                    class="alert alert-secondary"
                                @else 
                                    class="alert alert-success" 
                                @endif
                            >
                                {{ $pointItem->date_transfer > 0 ? date("d.m.Y", strtotime($pointItem->date_transfer)) : '-' }}
                            </td>
                            <td>
                                {{ $pointItem->date_refresh > 0 ? date("d.m.Y", strtotime($pointItem->date_refresh)) : '-' }}
                            </td>
                            <td>
                                {{ $pointItem->note }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection