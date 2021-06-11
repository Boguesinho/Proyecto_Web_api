<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('register', [UserController::class, 'register']);    // registro usuario
Route::post('login', [UserController::class, 'authenticate']); //login

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('logout',[UserController::class, 'logout']); //Cerrar sesión
    Route::post('subirFotoPerfil', [UserController::class, 'subirFotoPerfil']);
});
