<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\LokersController;
use App\Http\Controllers\Api\PenitipanController;


Route::get('/lokers', [LokersController::class, 'index']);
Route::post('/lokers/store', [LokersController::class, 'store']);
Route::get('/penitipan', [PenitipanController::class, 'index']);
Route::post('/penitipan/store', [PenitipanController::class, 'store']);
Route::delete('/lokers/{id}', [LokersController::class, 'destroy']);
Route::get('/lokers/{id}/penitipan', [PenitipanController::class, 'getByLoker']);

