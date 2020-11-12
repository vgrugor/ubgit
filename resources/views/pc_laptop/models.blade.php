@extends('layouts.site')

@section('content')
<div class="row">
    <div class="col">
        <h1 class="text-center">Список моделів ПК та ноутбуків</h1>
        <br>
        
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
                    
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-danger"></td>
                        </tr>
                    
                </tbody>
            </table>
    </div>
</div>
@endsection