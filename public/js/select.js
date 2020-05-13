$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//получить перечень отделов для выпадающего списка по определенной организации
function getDepartments(){
    var url = '/department/getAjaxList';
    
    $.ajax({
        type: 'POST',
        url: url,
        data: {organization: $("#organization_id").val()},
        
        success:function(data){
            //alert('ajax успешно выполнен');
            $("#department_id").html(data.departmentsList);
            console.log(data);
        },
        
        error: function (result) {
            alert('Ошибка');
            console.log(result);
        }
    });
    $("#division_id").html('<option value="0">не обрано</option>');
    $("#position_id").html('<option value="0">не обрано</option>');
};

//получить перечень подразделений для выпадающего списка по отделу
function getDivisions(){
    $("#division_id").html('<option value="0">не обрано</option>');
    
    var url = '/division/getAjaxList';
    
    $.ajax({
        type: 'POST',
        url: url,
        data: {department: $("#department_id").val()},
        
        success:function(data){
            //alert('ajax успешно выполнен');
            $("#division_id").html(data.divisionsList);
            console.log(data);
        },
        
        error: function (result) {
            alert('Ошибка');
            console.log(result);
        }
    });
    getPositions()
};

//получить перечень должностей для выпадающего списка по отделу и подразделению
function getPositions(){
    var url = '/position/getAjaxList';
    
    $.ajax({
        type: 'POST',
        url: url,
        data: {department: $("#department_id").val(),
            division: $("#division_id").val(),
        },
        
        success:function(data){
            //alert('ajax успешно выполнен');
            $("#position_id").html(data.positionsList);
            console.log(data);
        },
        
        error: function (result) {
            alert('Ошибка');
            console.log(result);
        }
    });
};


function getPositionsForUpdateWorker(){
    var url = '/position/getAjaxListForUpdate';
    
    $.ajax({
        type: 'POST',
        url: url,
        data: {department: $("#department_id").val(),
            division: $("#division_id").val(),
            worker: $("#worker_id").val(),
        },
        
        success:function(data){
            //alert('ajax успешно выполнен. Обновление работника');
            $("#position_id").html(data.positionsList);
            console.log(data);
        },
        
        error: function (result) {
            alert('Ошибка. Обновление работника');
            console.log(result);
        }
    });
};
