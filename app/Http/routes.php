<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'Admin\LessonsController@index');

Route::group(['namespace' => 'Admin'], function()
{
    Route::resource('admin/lessons', 'LessonsController');
});
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('admin/importExport', 'Admin\CsvController@importExport');
Route::get('admin/downloadExcel/{type}', 'Admin\CsvController@downloadExcel');
Route::post('admin/importExcel', 'Admin\CsvController@importExcel');