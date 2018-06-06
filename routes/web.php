<?php

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

Route::get('/', 'BlocksController@viewBlocks');
// Route::get('/view-block1', 'BlocksController@viewBlock1');
// Route::get('/view-block2', 'BlocksController@viewBlock2');
Route::get('/view-employees', 'BlocksController@viewemployees');

Route::get('/addmachine', 'MachinesController@addmachine');
Route::get('/addcompany', 'CompanysController@addcompany');
Route::get('/adddepartment', 'DepartmentsController@adddepartment');
Route::get('/addemployees', 'EmployeesController@addemployees');
Route::get('/editemployee/{id}', 'EmployeesController@edit');
Route::get('/addusers', 'UsersController@addusers');
Route::get('/editusers/{id}', 'UsersController@edit');
Route::get('/manageblocks', 'manageblocksController@manageblock');

Route::get('/viewblock/{blockname}', 'ViewblocksController@viewblock');
Route::get('/editblock/{blockname}', 'ViewblocksController@editblock');
// Route::get('/viewblock1', 'ViewblocksController@viewblock');
// Route::get('/viewblock2', 'ViewblocksController@viewblocktwo');

// Route::get('/editblock1', 'ViewblocksController@editblockone');
// Route::get('/editblock2', 'ViewblocksController@editblocktwo');

Route::resource('machinedetails', 'MachinesController');
Route::resource('company', 'CompanysController');
Route::resource('department', 'DepartmentsController');
Route::resource('employees', 'EmployeesController');
Route::resource('user', 'UsersController');
Route::resource('viewblock', 'ViewblocksController');
Route::resource('manageblock', 'ManageblocksController');
Route::resource('editblock', 'EditblocksController');

Route::post('/fetchrecord', 'AjaxController@fetchEmployeeRecord');
// Route::get('/addmachine', 'MachinesController@viewBlock2');

// Route::get('view-block1', function () {
//     return view('blocks.view-block1');
// });

// Route::get('view-block2', function () {
//     return view('blocks.view-block2');
// });

// Route::get('view-blocks', function () {
//     return view('blocks.view-blocks');
// });


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
