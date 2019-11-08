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

Route::view('/','index');

Auth::routes();

Route::group(['namespace' => 'Admin'], function() {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/employees', 'EmployeeController@index')->name('employees');

    Route::any('/add-employee', 'EmployeeController@addEmployee')->name('add-employee');

    Route::any('/edit-employee/{employee}', 'EmployeeController@editEmployee')->name('edit-employee');

    Route::get('/delete-employee/{employee}', 'EmployeeController@deleteEmployee')->name('delete-employee');

});
