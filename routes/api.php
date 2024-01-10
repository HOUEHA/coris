<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\ReclamationController;
use App\Http\Controllers\API\ReponseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post("register", [ClientController::class, "register"]);
Route::post("login", [ClientController::class, "login"]);

Route::group(["middleware"=>["auth:sanctum"]], function(){
    Route::get('profile', [ClientController::class, 'profile']);
    Route::get('logout', [ClientController::class, 'logout']);

    //Les projets
    Route::post('creer-reclamation', [ReclamationController::class, 'createReclamation']);
    Route::post('creer-reponse', [ReponseController::class, 'store']);

    // Route::delete('delete', [ProjetController::class, 'delete']);
    Route::post('list-reclamation/{id}', [ReclamationController::class, 'listReclamation_client']);
    Route::post('list_message/{id}', [ReponseController::class, 'listeMessageReclamation']);

    // Route::get('details/{id}', [ProjetController::class, 'details']);
    // Route::get('update/{id}', [ProjetController::class, 'update']);


});
