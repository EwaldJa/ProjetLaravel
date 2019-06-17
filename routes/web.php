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
Route::get('acceuil',function () {
    return view('welcome');
});
Route::get('accueil',function () {
    return view('welcome');
});
Route::get('prestations','ServiceController@getServices');
Route::post('ajoutPrestation','ServiceController@creationService');
Route::post('modifPrestation','ServiceController@updateService');
Route::post('supprImagePresta','ServiceController@supprImage');

Route::get('secteurs','SecteurController@getSecteurs');

Route::get('histoire','HistoireController@getHistoires');

Route::get('contact','ContactController@getContact');

Route::get('engagements','engagementController@getEngagements');
Auth::routes();

Route::get('home', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);
