$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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
};
