@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Довідник типів бурових</h1>
            <br/>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Назва</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach($drillTypesList as $drillTypeItem)
                        <tr>
                            <td>{{ $drillTypeItem->name }}</td>
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