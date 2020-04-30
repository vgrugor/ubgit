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


//----------------------------------ОТДЕЛ---------------------------------------

Route::post('department/getAjaxList', 'DepartmentController@getAjaxList');

//------------------------------------------------------------------------------

//------------------------------ПОДРАЗДЕЛЕНИЕ-----------------------------------

Route::post('division/getAjaxList', 'DivisionController@getAjaxList');

//------------------------------------------------------------------------------

//----------------------------------ДОЛЖНОСТЬ---------------------------------------

Route::post('position/getAjaxList', 'PositionController@getAjaxList');

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

//------------------------------------------------------------------------------

//******************************************************************************
//******************************************************************************




//*****************************АДМИНИСТРИРОВАНИЕ********************************
//******************************************************************************

//----------------------------ГЛАВНАЯ АДМИНКИ-----------------------------------

Route::get('admin', 'AdminController@index')->name('admin');

//------------------------------------------------------------------------------

//------------------------------ОРГАНИЗАЦИИ-------------------------------------
Route::get('admin/organizations', 'AdminOrganizationController@organizationsList')->name('adminOrganizationsList');
Route::get('admin/organization/update/{id}', 'AdminOrganizationController@update')->name('organizationUpdate');
Route::post('admin/organization/update/{id}', 'AdminOrganizationController@updateSave')->name('organizationUpdateSave');
Route::get('admin/organization/add', 'AdminOrganizationController@add');
Route::post('admin/organization/add', 'AdminOrganizationController@store')->name('organizationStore');

//------------------------------------------------------------------------------

//---------------------------------ОТДЕЛЫ---------------------------------------

Route::get('admin/departments', 'AdminDepartmentController@departmentsList')->name('adminDepartmentsList');
Route::get('admin/department/add', 'AdminDepartmentController@add');
Route::post('admin/department/add', 'AdminDepartmentController@store')->name('departmentStore');

//------------------------------------------------------------------------------

//------------------------------ПОДРАЗДЕЛЕНИЯ-----------------------------------

Route::get('admin/divisions', 'AdminDivisionController@divisionsList')->name('adminDivisionsList');
Route::get('admin/division/add', 'AdminDivisionController@add');
Route::post('admin/division/add', 'AdminDivisionController@store')->name('divisionStore');

//------------------------------------------------------------------------------

//--------------------------------ДОЛЖНОСТИ-------------------------------------

Route::get('admin/positions', 'AdminPositionController@positionsList')->name('adminPositionsList');
Route::get('admin/position/add', 'AdminPositionController@add');
Route::post('admin/position/add', 'AdminPositionController@store')->name('positionStore');

//------------------------------------------------------------------------------

//------------------------------СОТРУДНИКИ--------------------------------------

Route::get('admin/workers', 'AdminWorkerController@workersList')->name('adminWorkersList');
Route::get('admin/worker/add', 'AdminWorkerController@add');
Route::post('admin/worker/add', 'AdminWorkerController@store')->name('workerStore');

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

//-----------------------------СТАТУСЫ ИНТЕРНЕТА--------------------------------

Route::get('admin/vpnstatuses', 'AdminVpnStatusController@vpnStatusesList')->name('adminVpnStatusesList');

//------------------------------------------------------------------------------

//----------------------ФАКТИЧЕСКИЕ СТАДИИ БУРЕНИЯ------------------------------

Route::get('admin/actualstages', 'AdminActualStageController@actualStagesList')->name('adminActualStagesList');

//------------------------------------------------------------------------------

//******************************************************************************
//******************************************************************************





//для тестов
Route::get('test1', 'TestController@test1')->name('test');

Route::post('ajax', 'TestController@returnAjax');
