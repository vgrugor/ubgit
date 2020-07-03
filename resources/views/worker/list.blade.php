@extends('layouts.site')

@section('content')
    
    <div class="row">
        <div class="col">
            <h1 class="text-center">Список працівників</h1>
            <br/>
            
            <!---------------------------------------------------Поиск---------------------------------------------------->
            <div class="row">
                <div class="col-sm-3">
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
                    <div class="form-group">
                        <select class="form-control" id="selectDepartment">
                            <option value="">Всі відділи</option>
                            @foreach ($departmentsList as $departmentItem)
                                <option value="{{ $departmentItem->department }}">{{ $departmentItem->department }} ({{ $departmentItem->organization }})</option>
                            @endforeach
                        </select>
                      </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select class="form-control" id="selectDrill">
                            <option value="">Оберіть свердловину</option>
                            @foreach ($drillsList as $drillItem)
                                <option>{{ $drillItem->name }}</option>
                            @endforeach
                        </select>
                      </div>
                </div>
                <div class="col-sm-2">
                    <input class="form-control" id="search" type="text" placeholder="Пошук...">
                </div>
            </div>
            <!------------------------------------------------------------------------------------------------------------->
            
            <br/>
            <table class="table table-sm table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Організація</th>
                        <th scope="col">Відділ</th>
                        <th scope="col">Підрозділ</th>
                        <th scope="col">Посада</th>
                        <th scope="col">Бурова</th>
                        <th scope="col">ПІБ</th>
                        <th scope="col">Примітка</th>
                    </tr>
                </thead>
                <tbody id="tableForSearch">
                    @foreach ($workersList as $workerItem)
                        <tr>
                            <td>{{ $workerItem->organization }}</td>
                            <td>{{ $workerItem->department }}</td>
                            <td>{{ $workerItem->division }}</td>
                            <td>{{ $workerItem->position }}</td>
                            <td>{{ $workerItem->drill }}</td>
                            <td><a href="{{ route('viewWorker', ['id' => $workerItem->id])}}">{{ $workerItem->name }}</a></td>
                            <td class="text-danger">{{ $workerItem->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection