<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
     return $request->user();
});

//PROVA
//per verificare il corretto funzionamento indirizzare la pagina a /api/v1/test
Route::group(['prefix'=>'/v1'], function(){

//  Route::get('test', [ApiController::class, 'getTest']);
    Route::get('technologies', [ApiController::class, 'getTechnologies']);
    Route::post('technologies', [ApiController::class, 'createTechnologies']);
});




