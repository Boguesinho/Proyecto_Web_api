<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('register', [UserController::class, 'register']);    // registro usuario
Route::post('login', [UserController::class, 'authenticate']); //login

Route::get('getListaPais',[UserController::class, 'getListaPais']);
Route::get('getListaGenero',[UserController::class, 'getListaGenero']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('logout',[UserController::class, 'logout']); //Cerrar sesión
    Route::post('subirFotoPerfil', [UserController::class, 'subirFotoPerfil']);
    Route::get('getInfoPersonal',[UserController::class, 'getInfoPersonal']);
    Route::put('editInfo',[UserController::class, 'editInfo']);
    Route::get('getListaInteres',[UserController::class, 'getListaInteres']);
    Route::get('getUsuariosRecomendados',[UserController::class, 'getUsuariosRecomendados']);

    Route::post('agegarInteres/{idInteres}', [\App\Http\Controllers\InteresController::class, 'agegarInteres']);
    Route::get('misIntereses', [\App\Http\Controllers\InteresController::class, 'misIntereses']);
    Route::delete('eliminarInteres/{idInteres}',[\App\Http\Controllers\InteresController::class, 'eliminarInteres']);
    Route::get('getInteresesUsuario/{idUsuario}', [\App\Http\Controllers\InteresController::class, 'getInteresesUsuario']);
});
