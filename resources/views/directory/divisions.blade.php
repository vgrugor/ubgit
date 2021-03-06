@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Довідник підрозділів</h1>
            <br/>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Організація</th>
                    <th scope="col">Відділ</th>
                    <th scope="col">Назва підрозділу</th>
                    <th scope="col">Примітка</th>
                </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach($divisionsList as $divisionItem)
                        <tr>
                            <td>{{ $divisionItem->organization }}</td>
                            <td>{{ $divisionItem->department }}</td>
                            <td>{{ $divisionItem->name }}</td>
                            <td>{{ $divisionItem->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection