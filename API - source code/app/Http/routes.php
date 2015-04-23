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
$app->get('/{parse}', 'App\Http\Controllers\ApiVarious@frontpage');

// Routes for the soldiers.
$app->get('/{parse}/soldiers/all', 'App\Http\Controllers\ApiSoldiers@soldiers');
$app->get('/{parse}/soldiers/{id}', 'App\Http\Controllers\ApiSoldiers@soldier');

// Routes for graveyards?.
$app->get('/{parse}/graveyards/all', 'App\Http\Controllers\ApiBegraafplaatsen@graveyards');
$app->get('/{parse}/graveyard/{id}', 'App\Http\Controllers\ApiBegraafplaatsen@graveyard');

// Routes for regiments.
$app->get('/regiments/all', 'App\Http\Controllers\ApiRegiments@regiments');
$app->get('/regiments/{id}', 'App\Http\Controllers\ApiRegiments@regiment');

