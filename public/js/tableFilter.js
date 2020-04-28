$(document).ready(function(){
    
    //изменение поля для поиска
    $("#search").on("keyup", function() {
      searchTable();
    });
    
    //изменение выпадающего списка с организациями
    $("#selectOrganization").on("change", function() {
        filterOrganization();
    });
    
    //изменение выпадающего списка с отделами
    $("#selectDepartment").on("change", function() {
        filterDepartment();
    });
    
    //изменение выпадающего списка с буровыми
    $("#selectDrill").on("change", function() {
        filterDrill();
    });
});


//поиск
function searchTable() {
    var value = $("#search").val().toLowerCase();
    $("#tableForSearch tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    
    $("#selectOrganization").val('');
    $("#selectDepartment").val('');
    $("#selectDrill").val('');
}

//фильтр по организации
function filterOrganization() {
    var value = $("#selectOrganization").val().toLowerCase();
    $("#tableForSearch tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    $("#selectDepartment option").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    
    $("#selectDepartment").val('');
    $("#selectDrill").val('');
}

//фильтр по отделу
function filterDepartment() {
    var value = $("#selectDepartment").val().toLowerCase();
    $("#tableForSearch tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    
    $("#selectDrill").val('');
}

//фильтр по буровых
function filterDrill() {
    var value = $("#selectDrill").val().toLowerCase();
    $("#tableForSearch tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    
    $("#selectOrganization").val('');
    $("#selectDepartment").val('');
}