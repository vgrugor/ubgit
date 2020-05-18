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
    
    if($("#organization_id").val() > 0){
        getOrganizationType();
    };
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
    var url = '/position/getAjaxListForAdd';
    
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

//получить перечень подразделений для выпадающего списка 
//по отделу при редактировании работника
function getDivisionsForUpdateWorker(){
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
    getPositionsForUpdateWorker()
};

//получить перечень должностей для выпадающего списка 
//по подразделению или отделу при редактировании работника
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


function getOrganizationType() {
    var url = '/organization/getAjaxOrganizationType';
    
    $.ajax({
        type: 'POST',
        url: url,
        data: {organization: $("#organization_id").val()},
        
        success:function(data){
            console.log(data);
            if (data == 'ВБР') 
            {
                showDrill();
            }
            else if (data == 'ВТТіСТ') {
                showMotorcare();
            }
            else {
                hideDrillMotorcade();
            }
        },
        
        error: function (result) {
            alert('Ошибка получения типа организации');
            console.log(result);
        }
    });
};

//показать поле с выбором буровой
function showDrill(){
    document.getElementById('drill_form').classList.remove('d-none');
    document.getElementById('motorcade_form').classList.add('d-none');
    $("#motorcade_id").val("0");
}

//показать поле с выбором автоколоны
function showMotorcare(){
    document.getElementById('motorcade_form').classList.remove('d-none');
    document.getElementById('drill_form').classList.add('d-none');
    $("#drill_id").val("0");
}

//скрыть поля для выбора автоколоны и буровой
function hideDrillMotorcade(){
    document.getElementById('motorcade_form').classList.add('d-none');
    document.getElementById('drill_form').classList.add('d-none');
    $("#drill_id").val("0");
    $("#motorcade_id").val("0");
}

