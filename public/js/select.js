function getDepartments(){
    var url = "{{ route('ajaxListDepartment') }}";
    alert('Функция работает');
    $.ajax({
        type: 'POST',
        url: '/' + url,
        //url: "{{ URL::route('departmentListFromSelect') }}",
        data:{ _token: '{!! csrf_token() !!}' },
        success:function(data){
            alert('ajax успешно выполнен');
            $("#testSelect").html(data);
            console.log(data);
        },
        error: function () {
            alert('Ошибка');
            console.log(data);
        },
    });
};