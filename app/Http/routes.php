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
    return view('welcome.welcome');
});

Route::get('/home', 'HomeController@index');

Route::get('/admin', 'Admin\LessonsController@index');

Route::group(['prefix' => 'admin/lessons', 'namespace' => 'Admin'], function() {
    Route::get('importExport', 'LessonsController@importExport');
    Route::get('downloadExcel/{type}', 'LessonsController@downloadExcel');
    Route::post('importExcel', 'LessonsController@importExcel');
});

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function()
{
    Route::resource('lessons', 'LessonsController');
});

Route::auth();

