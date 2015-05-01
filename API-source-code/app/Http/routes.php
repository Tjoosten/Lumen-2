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

// Misc routes.
$app->get('/', 'App\Http\Controllers\ApiVarious@frontpage');

// Routes for the soldiers.
$app->get('/soldiers/all', 'App\Http\Controllers\ApiSoldiers@getSoldiers');
$app->get('/soldiers/{id}', 'App\Http\Controllers\ApiSoldiers@getSoldier');
$app->post('/soldiers/insert', 'App\Http\Controllers\ApiSoldiers@insert');

// ------------------------------------------------------------------------------------
// ROUTE: graveyards
// ------------------------------------------------------------------------------------
$app->get('/graveyards/all', 'App\Http\Controllers\ApiBegraafplaatsen@graveyards');

$app->get('/graveyards/{id}', 'App\Http\Controllers\ApiBegraafplaatsen@graveyard');
$app->put('/graveyards/{id}','App/Http/Controllers/ApiBegraafplaatsen@InsertGraveyard'); // Insert
$app->patch('/graveyards/{id}','App/Http/Controllers/ApiBegraafplaatsen@Updategraveyard'); // Update
$app->delete('/graveyards/{id}','App/Http/Controllers/ApiBegraafplaatsen@'): // Delete
// ------------------------------------------------------------------------------------

// Routes for Civilians
$app->get('', '');
$app->get('', '');

// Routes for sailors.
$app->get('', '');
$app->get('', '');

// Routes for political prinsoners.
$app->get('', '');
$app->get('', '');

// Routes for resistance fighters.
$app->get('', '');
$app->get('', '');

// Routes for regiments.
$app->get('/regiments/all', 'App\Http\Controllers\ApiRegiments@regiments');
$app->get('/regiments/{id}', 'App\Http\Controllers\ApiRegiments@regiment');
$app->post('/regiments/insert', 'App\Http\Controllers\ApiRegiments@insertRegiment');
