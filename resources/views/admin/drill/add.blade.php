@extends('layouts.site')

@section('content')
    
    <div class="row">
        <div class="col">
            <h1 class="text-center">Додати нову бурову</h1>
            <br/>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <form method="post" action="{{ route('drillStore') }}">
                <div class="form-group">
                    <label for="number">Введіть номер бурової</label>
                    <input type="text" name="number" id="number" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="drill_type_id">Вкажіть тип бурової</label>
                    <select name="drill_type_id" id="drill_type_id" class="form-control">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Введіть назву бурової</label>
                    <input type="text" name="name" value="" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="nld">Пн.ш.<sup>0</sup></label>
                    <input type="text" name="nld" value="" class="form-control" id="nld">
                </div>
                <div class="form-group">
                    <label for="nlm">Пн.ш.'</label>
                    <input type="text" name="nlm" value="" class="form-control" id="nlm">
                </div>
                <div class="form-group">
                    <label for="nls">Пн.ш."</label>
                    <input type="text" name="nls" value="" class="form-control" id="nls">
                </div>
                <div class="form-group">
                    <label for="eld">Сх.д.<sup>0</sup></label>
                    <input type="text" name="eld" value="" class="form-control" id="eld">
                </div>
                <div class="form-group">
                    <label for="elm">Сх.д.'</label>
                    <input type="text" name="elm" value="" class="form-control" id="elm">
                </div>
                <div class="form-group">
                    <label for="els">Сх.д."</label>
                    <input type="text" name="els" value="" class="form-control" id="els">
                </div>
                <div class="form-group">
                    <label for="coordinate_stage">Координати отримано</label>
                    <select name="coordinate_stage" class="form-control" id="coordinate_stage">
                        <option value="0">При плануванні</option>
                        <option value="1">В бурінні</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Адреса</label>
                    <textarea name="address" id="address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="phone_number">Номер телефону в форматі (ХХХ)ХХХ-ХХ-ХХ</label>
                    <input type="text" name="phone_number" value="" id="phone_number" class="form-control" placeholder="(XXX)XXX-XX-XX">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" value="" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="date_building">Дата початку монтажу</label>
                    <input type="date" name="date_building" value="" class="form-control" id="date_building">
                </div>
                <div class="form-group">
                    <label for="date_drilling">Дата початку буріння</label>
                    <input type="date" name="date_drilling" value="" class="form-control" id="date_drilling">
                </div>
                <div class="form-group">
                    <label for="date_demount">Дата початку демонтажу</label>
                    <input type="date" name="date_demount" value="" class="form-control" id="date_demount">
                </div>
                <div class="form-group">
                    <label for="date_transfer">Дата здачі в експлуатацію</label>
                    <input type="date" name="date_transfer" value="" class="form-control" id="date_transfer">
                </div>
                <div class="form-group">
                    <label for="date_refresh">Дата оновлення інформації</label>
                    <input type="date" name="date_refresh" value="" class="form-control" id="date_refresh">
                </div>
                <div class="form-group">
                    <label for="actual_stage_id">Вкажіть фактичний етап буріння</label>
                    <select name="actual_stage_id" id="actual_stage_id" class="form-control">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_actual_stage_refresh">Дата оновлення інформації про фактичний етап буріння</label>
                    <input type="date" name="date_actual_stage_refresh" value="" class="form-control" id="date_actual_stage_refresh">
                </div>
                <div class="form-group">
                    <label for="note">Примітка</label>
                    <textarea name="note" class="form-control" id="note"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Додати" class="btn btn-success" role="button">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection