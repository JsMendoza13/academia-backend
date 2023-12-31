<?php

use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource("v1/estudiantes", EstudiantesController::class);
Route::apiResource("v1/materias", MateriasController::class);
Route::apiResource("v1/maestros", MaestrosController::class);
Route::apiResource("v1/users", UserController::class);
