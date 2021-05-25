<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('register', [UserController::class, 'register']);    // registro usuario
Route::post('login', [UserController::class, 'authenticate']); //login

