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
Route::get('home', function () {
    return view('welcome');
});


Route::get('implantation', function () {
    return view('maps');
});
Route::get('maps', function () {
    return view('maps');
});


Route::get('prestations','ServiceController@getServices');
Route::post('ajoutPrestation','ServiceController@creationService');
Route::post('modifPrestation','ServiceController@modifService');
Route::post('supprImagePresta','ServiceController@supprImage');

Route::get('secteurs','SecteurController@getSecteurActivites');
Route::post('ajoutSecteur','SecteurController@creationSecteurActivite');
Route::post('modifSecteur','SecteurController@modifSecteurActivite');
Route::post('supprImageSecteur','SecteurController@supprImage');

Route::get('histoire','HistoireController@getHistoires');

Route::get('contact','ContactController@getContact');
Route::post('envoyerContact','ContactController@envoyerContact');
Route::post('VoirContact','ContactController@getContactById');
Route::get('envoyerContact', function () {
    return view('welcome');
});
Route::post('supprimerContact','ContactController@supprContact');

Route::get('engagements','EngagementController@getEngagements');
Route::post('ajoutEngagement','EngagementController@creationEngagement');
Route::post('modifEngagement','EngagementController@modifEngagement');
Route::post('supprImageEngagement','EngagementController@supprImage');


Auth::routes(['register'=>false]);
