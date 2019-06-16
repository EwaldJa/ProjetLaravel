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

Route::get('Conferences','ConferenceController@getConferences');
Route::get('ajoutConference','ConferenceController@ajoutConference');
Route::post('saisieConference','ConferenceController@postAjoutConference');
Route::get('Conference/{id}','ConferenceController@getConferenceById');
Route::get('Formations','FormationController@getFormations');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
