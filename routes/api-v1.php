<?php

use App\Http\Controllers\Api\BuzonController;
use App\Http\Controllers\Api\chatsController;
use App\Http\Controllers\Api\CiudadeController;
use App\Http\Controllers\Api\comentariosController;
use App\Http\Controllers\Api\departamentoController;
use App\Http\Controllers\Api\EmpleoController;
use App\Http\Controllers\Api\emprendimientosController;
use App\Http\Controllers\Api\GeneroController;
use App\Http\Controllers\Api\inversionistaController;
use App\Http\Controllers\Api\InversionistaController as ApiInversionistaController;
use App\Http\Controllers\Api\MultimediaController;
use App\Http\Controllers\Api\NotificacioneController;
use App\Http\Controllers\Api\PublicacioneController;
use App\Http\Controllers\Api\ReaccioneController;
use App\Http\Controllers\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::get('hola', function(){
    return 'hola';
});

// Route::get("Buzon", [BuzonController::class,"index"])->name("api.v1.buzon.index");
// Route::post("Buzon", [BuzonController::class,"store"])->name("api.v1.buzon.store");
// Route::get("Buzon/{Buzon}",[BuzonController::class, "show"])->name("api.v1.buzon.show");
// Route::get("Buzon/{Buzon}", [BuzonController::class,"update"])->name("api.v1.buzon.show");
// Route::delete("Buzon/{Buzon}",[BuzonController::class,"destroy"])->name("api.v1.buzon.show");

Route::apiResource("buzones", BuzonController::class)->names("api.v1.buzon");
Route::apiResource("departamento",departamentoController::class)->names("api.v1.departamento");
Route::apiResource("chats", chatsController::class)->names("api.v1.chats");
Route::apiResource("comentario", comentariosController::class)->names("api.v1.comentarios");
Route::apiResource("emprendimientos", emprendimientosController::class)->names("api.v1.emprendimientos");
Route::apiResource("inversionistas", ApiInversionistaController::class)->names("api.v1.inversionistas");
Route::apiResource("empleo", EmpleoController::class)->names("api.v1.empleo");
Route::apiResource("publicacione", PublicacioneController::class)->names("api.v1.publicacione");
Route::apiResource("multimedia", MultimediaController::class)->names("api.v1.multimedia");
Route::apiResource("notificacione", NotificacioneController::class)->names("api.v1.notificacione");
Route::apiResource("reaccione ", ReaccioneController::class)->names("api.v1.reaccione");
Route::apiResource("ciudade", CiudadeController::class)->names("api.v1.ciudade");
Route::apiResource("genero", GeneroController::class)->names("api.v1.genero");

