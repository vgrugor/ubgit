@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Інтернет</h1>
            <h2 class="text-right">DataGroup</h2>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Бурова</th>
                    <th scope="col">Етап буріння</th>
                    <th scope="col">Стан інтернету</th>
                    <th scope="col">Дата зміни стану</th>
                    <th scope="col">Комплект DataGroup</th>
                    <th scope="col">Примітка</th>
                </tr>
                </thead>
                <tbody class="table-striped">
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <br/>
            <h2 class="text-right">Infocom</h2>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Бурова</th>
                    <th scope="col">Етап буріння</th>
                    <th scope="col">Стан інтернету</th>
                    <th scope="col">Дата зміни стану</th>
                    <th scope="col">Примітка</th>
                </tr>
                </thead>
                <tbody class="table-striped">
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection