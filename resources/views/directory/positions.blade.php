@extends('layouts.site')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Довідник посад</h1>
            <br/>
            <!---------------------------------------------------Поиск---------------------------------------------------->
            <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select class="form-control" id="selectOrganization">
                                    <option value="">Всі організації</option>
                                    @foreach ($organizationsList as $organizationItem)
                                        <option>{{ $organizationItem->name }}</option>
                                    @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="col-sm-5">
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
                            <input class="form-control" id="search" type="text" placeholder="Пошук...">
                        </div>
                    </div>
            <!------------------------------------------------------------------------------------------------------------->
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Організація</th>
                    <th scope="col">Відділ</th>
                    <th scope="col">Підрозділ</th>
                    <th scope="col">Назва посади</th>
                    <th scope="col">Примітка</th>
                </tr>
                </thead>
                <tbody class="table-striped" id="tableForSearch">
                    @foreach($positionsList as $positionItem)
                        <tr>
                            <td class="text-nowrap">{{ $positionItem->organization }}</td>
                            <td>{{ $positionItem->department }}</td>
                            <td>{{ $positionItem->division }}</td>
                            <td>{{ $positionItem->name }}</td>
                            <td>{{ $positionItem->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection