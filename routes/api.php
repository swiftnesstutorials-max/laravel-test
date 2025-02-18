<?php

use App\Http\Controllers\LevelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/levels', [LevelController::class, 'apiIndex'])->name('apiLevels');
Route::post('/levels', [LevelController::class, 'apiStore'])->name('apiStore');
