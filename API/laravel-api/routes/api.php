<?php

use App\Http\Controllers\IdentifiantController;
use App\Http\Controllers\ProjetController;
use App\Models\IdentifiantProjet;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('identifiants', IdentifiantController::class);
Route::get('/identifiants/search/{name}', [IdentifiantController::class, 'search']);
Route::post('/identifiants/attach', [IdentifiantController::class, 'attach']);
Route::get('/identifiants/attached_project/{id}', [IdentifiantController::class, 'attached_project']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('projets', ProjetController::class)->middleware('restrictothers');
});

Route::post('/projets/attach', [ProjetController::class, 'attach']);
Route::get('/projets/attached_identifiants/{id}', [ProjetController::class, 'attached_identifiants']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
