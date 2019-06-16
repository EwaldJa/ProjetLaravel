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

Route::get('/', function () {
    return view('welcome');
});

Route::get('Services','ServiceController@getServices');
Route::get('ajoutConference','ServiceController@ajoutConference');
Route::post('saisieConference','ServiceController@postAjoutConference');
Route::get('Service/{id}','ServiceController@getServiceById');
Route::get('Formations','FormationController@getFormations');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
