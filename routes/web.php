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

Route::get('/', 'IndexController@index');

//-------------------------------БУРОВЫЕ----------------------------------------

Route::get('drill/add', 'DrillController@add');             //страница с формой
Route::post('drill/add', 'DrillController@store')->name('drillStore');          //добавление в БД

Route::get('drill/general', 'DrillController@general');     //общая информация
Route::get('drill/internet', 'DrillController@internet');   //состояние интернета
Route::get('drill/carpet', 'DrillController@carpet');       //ковер бурения
Route::get('drill/contacts', 'DrillController@contacts');   //контакты
Route::get('drill/location', 'DrillController@location');   //размещение буровых
Route::get('drill/{id}', 'DrillController@view')->name('viewDrill');           //подробно о буровой

//------------------------------------------------------------------------------


//------------------------------СОТРУДНИКИ--------------------------------------

Route::get('worker/add', 'WorkerController@add');
Route::post('worker/add', 'WorkerController@store')->name('workerStore');

Route::get('workerlist', 'WorkerController@index');             //список сотрудников
Route::get('worker/{id}', 'WorkerController@view')->name('viewWorker');         //подробно о сотруднике

//------------------------------------------------------------------------------

//------------------------------ОРГАНИЗАЦИИ-------------------------------------

Route::get('organization/add', 'OrganizationController@add');
Route::post('organization/add', 'OrganizationController@store')->name('organizationStore');

//------------------------------------------------------------------------------

//---------------------------------ОТДЕЛЫ---------------------------------------

Route::get('department/add', 'DepartmentController@add');
Route::post('department/getAjaxList', 'DepartmentController@getAjaxList');
Route::post('department/add', 'DepartmentController@store')->name('departmentStore');

//------------------------------------------------------------------------------

//------------------------------ПОДРАЗДЕЛЕНИЯ-----------------------------------

Route::get('division/add', 'DivisionController@add');
Route::post('division/getAjaxList', 'DivisionController@getAjaxList');
Route::post('division/add', 'DivisionController@store')->name('divisionStore');

//------------------------------------------------------------------------------

//--------------------------------ДОЛЖНОСТИ-------------------------------------

Route::get('position/add', 'PositionController@add');
Route::post('position/getAjaxList', 'PositionController@getAjaxList');
Route::post('position/add', 'PositionController@store')->name('positionStore');

//------------------------------------------------------------------------------

//-------------------------------СПРАВОЧНИКИ------------------------------------

Route::get('directory/organizations', 'DirectoryController@organizationsList')->name('organizationsList');
Route::get('directory/departments', 'DirectoryController@departmentsList')->name('departmentsList');
Route::get('directory/divisions', 'DirectoryController@divisionsList')->name('divisionsList');
Route::get('directory/positions', 'DirectoryController@positionsList')->name('positionsList');
Route::get('directory/drill_type', 'DirectoryController@drillsTypesList')->name('drillsTypesList');
Route::get('directory/vpn_statuses', 'DirectoryController@vpnStatusesList')->name('vpnStatusesList');
Route::get('directory/datagroup_statuses', 'DirectoryController@dataGroupStatusesList')->name('dataGroupStatusesList');

//------------------------------------------------------------------------------

//для тестов
Route::get('test1', 'TestController@test1')->name('test');

Route::post('ajax', 'TestController@returnAjax');
