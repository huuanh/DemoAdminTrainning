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

Route::get('/admin', 'admin\LessonsController@index');

Route::group(['namespace' => 'admin'], function()
{
    Route::resource('admin/lessons', 'LessonsController');
});
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('admin/importExport', 'admin\CsvController@importExport');
Route::get('admin/downloadExcel/{type}', 'admin\CsvController@downloadExcel');
Route::post('admin/importExcel', 'admin\CsvController@importExcel');