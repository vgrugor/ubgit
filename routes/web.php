<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//***********************ОТКРЫТАЯ ЧАСТЬ САЙТА***********************************
//******************************************************************************

//-------------------------------ГЛАВНАЯ----------------------------------------

Route::get('/', 'IndexController@index');

//------------------------------------------------------------------------------

//-----------------------------ОРГАНИЗАЦИИ--------------------------------------

Route::post('/organization/getAjaxOrganizationType', 'OrganizationController@getAjaxOrganizationType');

//------------------------------------------------------------------------------

//----------------------------------ОТДЕЛ---------------------------------------

Route::post('department/getAjaxList', 'DepartmentController@getAjaxList');

//------------------------------------------------------------------------------

//------------------------------ПОДРАЗДЕЛЕНИЕ-----------------------------------

Route::post('division/getAjaxList', 'DivisionController@getAjaxList');

//------------------------------------------------------------------------------

//----------------------------------ДОЛЖНОСТЬ---------------------------------------

Route::post('position/getAjaxListForAdd', 'PositionController@getAjaxListForAdd');
Route::post('position/getAjaxListForUpdate', 'PositionController@getAjaxListForUpdate');

//------------------------------------------------------------------------------


//-------------------------------БУРОВЫЕ----------------------------------------

Route::get('drill/general', 'DrillController@general');                         //общая информация
Route::get('drill/internet', 'DrillController@internet');                       //состояние интернета
Route::get('drill/carpet', 'DrillController@carpet');                           //ковер бурения
Route::get('drill/contacts', 'DrillController@contacts');                       //контакты
Route::get('drill/location', 'DrillController@location');                       //размещение буровых

//------------------------------------------------------------------------------


//------------------------------СОТРУДНИКИ--------------------------------------

Route::get('workerlist', 'WorkerController@index');                             //список сотрудников
Route::get('worker/{id}', 'WorkerController@view')->name('viewWorker');         //подробно о сотруднике

//------------------------------------------------------------------------------


//-------------------------------СПРАВОЧНИКИ------------------------------------

Route::get('directory/organizations', 'DirectoryController@organizationsList')->name('organizationsList');
Route::get('directory/departments', 'DirectoryController@departmentsList')->name('departmentsList');
Route::get('directory/divisions', 'DirectoryController@divisionsList')->name('divisionsList');
Route::get('directory/positions', 'DirectoryController@positionsList')->name('positionsList');
Route::get('directory/workers', 'DirectoryController@workersList')->name('workersList');
Route::get('directory/drill_type', 'DirectoryController@drillsTypesList')->name('drillsTypesList');
Route::get('directory/vpn_statuses', 'DirectoryController@vpnStatusesList')->name('vpnStatusesList');
Route::get('directory/datagroup_statuses', 'DirectoryController@dataGroupStatusesList')->name('dataGroupStatusesList');
Route::get('directory/actual_stages', 'DirectoryController@actualStagesList')->name('actualStagesList');
Route::get('directory/motorcades', 'DirectoryController@motorcadesList')->name('motorcadesList');

//------------------------------------------------------------------------------

//---------------------------ДОСТУП ЗАПРЕЩЕН------------------------------------

Route::get('access_denied', function(){
    return view('access_denied');
})->name('access_denied');

//------------------------------------------------------------------------------

//******************************************************************************
//******************************************************************************




//*****************************АДМИНИСТРИРОВАНИЕ********************************
//******************************************************************************

//----------------------------ГЛАВНАЯ АДМИНКИ-----------------------------------

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin', 'AdminController@index')->middleware('auth', 'admin')->name('admin');

    //------------------------------------------------------------------------------

    //------------------------------ОРГАНИЗАЦИИ-------------------------------------

    Route::get('admin/organizations', 'AdminOrganizationController@organizationsList')->name('adminOrganizationsList');
    //Редактирование
    Route::get('admin/organization/update/{id}', 'AdminOrganizationController@update')->name('organizationUpdate');
    Route::post('admin/organization/update/{id}', 'AdminOrganizationController@save')->name('organizationSave');
    //Добавление
    Route::get('admin/organization/add', 'AdminOrganizationController@add')->name('organizationAdd');
    Route::post('admin/organization/add', 'AdminOrganizationController@store')->name('organizationStore');

    //------------------------------------------------------------------------------

    //---------------------------------ОТДЕЛЫ---------------------------------------

    Route::get('admin/departments', 'AdminDepartmentController@departmentsList')->name('adminDepartmentsList');

    Route::get('admin/department/add', 'AdminDepartmentController@add')->name('departmentAdd');
    Route::post('admin/department/add', 'AdminDepartmentController@store')->name('departmentStore');

    Route::get('admin/department/update/{id}', 'AdminDepartmentController@update')->name('departmentUpdate');
    Route::post('admin/department/update/{id}', 'AdminDepartmentController@save')->name('departmentSave');

    //------------------------------------------------------------------------------

    //------------------------------ПОДРАЗДЕЛЕНИЯ-----------------------------------

    Route::get('admin/divisions', 'AdminDivisionController@divisionsList')->name('adminDivisionsList');

    Route::get('admin/division/add', 'AdminDivisionController@add')->name('divisionAdd');
    Route::post('admin/division/add', 'AdminDivisionController@store')->name('divisionStore');

    Route::get('admin/division/update/{id}', 'AdminDivisionController@update')->name('divisionUpdate');
    Route::post('admin/division/update/{id}', 'AdminDivisionController@save')->name('divisionSave');

    //------------------------------------------------------------------------------

    //--------------------------------ДОЛЖНОСТИ-------------------------------------

    Route::get('admin/positions', 'AdminPositionController@positionsList')->name('adminPositionsList');

    Route::get('admin/position/add', 'AdminPositionController@add')->name('positionAdd');
    Route::post('admin/position/add', 'AdminPositionController@store')->name('positionStore');

    Route::get('admin/position/update/{id}', 'AdminPositionController@update')->name('positionUpdate');
    Route::post('admin/position/update/{id}', 'AdminPositionController@save')->name('positionSave');

    //------------------------------------------------------------------------------

    //------------------------------СОТРУДНИКИ--------------------------------------

    //Список сотрудников в админке
    Route::get('admin/workers', 'AdminWorkerController@workersList')->name('adminWorkersList');

    //Добавление сотрудника
    Route::get('admin/worker/add', 'AdminWorkerController@add')->name('workerAdd');
    Route::post('admin/worker/add', 'AdminWorkerController@store')->name('workerStore');

    //Обновление информации о сотруднике
    Route::get('admin/worker/update/{id}', 'AdminWorkerController@update')->name('workerUpdate');
    Route::post('admin/worker/update/{id}', 'AdminWorkerController@save')->name('workerSave');

    //Увольнение сотрудника
    Route::get('admin/worker/dismiss/{id}', 'AdminWorkerController@dismiss')->name('dismissWorker');
    Route::get('admin/worker/remove/{id}', 'AdminWorkerController@remove')->name('removeWorker');

    //------------------------------------------------------------------------------

    //-------------------------------БУРОВЫЕ----------------------------------------

    Route::get('admin/drills', 'AdminDrillController@drillsList')->name('adminDrillsList');
    Route::get('admin/drill/add', 'DrillController@add');                                 //страница с формой добавления буровой
    Route::post('admin/drill/add', 'DrillController@store')->name('drillStore');          //добавление в БД
    Route::get('admin/drill/{id}', 'DrillController@view')->name('viewDrill');           //подробно о буровой

    //------------------------------------------------------------------------------

    //-----------------------------ТИПЫ БУРОВЫХ-------------------------------------

    Route::get('admin/drilltypes', 'AdminDrillTypeController@drillTypesList')->name('adminDrillTypesList');

    //------------------------------------------------------------------------------

    //-----------------------------СТАТУСЫ ИНТЕРНЕТА--------------------------------

    Route::get('admin/internetstatuses', 'AdminInternetStatusController@internetStatusesList')->name('adminInternetStatusesList');

    //------------------------------------------------------------------------------

    //--------------------------------СТАТУСЫ VPN--------------------------------------

    Route::get('admin/vpnstatuses', 'AdminVpnStatusController@vpnStatusesList')->name('adminVpnStatusesList');

    Route::get('admin/vpnstatus/add', 'AdminVpnStatusController@add')->name('vpnStatusAdd');
    Route::post('admin/vpnstatus/add', 'AdminVpnStatusController@store')->name('vpnStatusStore');

    Route::get('admin/vpnstatus/update/{id}', 'AdminVpnStatusController@update')->name('vpnStatusUpdate');
    Route::post('admin/vpnstatus/update/{id}', 'AdminVpnStatusController@save')->name('vpnStatusSave');

    //------------------------------------------------------------------------------

    //----------------------ФАКТИЧЕСКИЕ СТАДИИ БУРЕНИЯ------------------------------

    Route::get('admin/actualstages', 'AdminActualStageController@actualStagesList')->name('adminActualStagesList');

    //------------------------------------------------------------------------------

    //-------------------------------АВТОКОЛОННЫ------------------------------------

    Route::get('admin/motorcades', 'AdminMotorcadeController@motorcadesList')->name('adminMotorcadesList')->middleware('auth');

    Route::get('admin/motorcade/add', 'AdminMotorcadeController@add')->name('motorcadeAdd');
    Route::post('admin/motorcade/add', 'AdminMotorcadeController@store')->name('motorcadeStore');

    Route::get('admin/motorcade/update/{id}', 'AdminMotorcadeController@update')->name('motorcadeUpdate');
    Route::post('admin/motorcade/update/{id}', 'AdminMotorcadeController@save')->name('motorcadeSave');

    //------------------------------------------------------------------------------
});
//******************************************************************************
//******************************************************************************


//для тестов
Route::get('test1', 'TestController@test1')->name('test');

Route::post('ajax', 'TestController@returnAjax');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
