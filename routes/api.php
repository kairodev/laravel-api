<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CarroController;
use App\Http\Controllers\api\FilmeController;
use App\Http\Controllers\api\LoginController;

// ROTA API - CARROS (api/carros)
Route::apiResource('carros', CarroController::class)->middleware('auth:sanctum');

// ROTA API - FILMES (api/filmes)
Route::apiResource('filmes', FilmeController::class)->middleware('auth:sanctum');

// ROTA API - AUTENTICAÇÃO
Route::post('/login', [LoginController::class,'obterToken']);