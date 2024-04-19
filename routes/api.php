<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/all', [CarController::class, 'getAll']);
Route::post('/update/{car:id}', [CarController::class, 'update'])
    ->where('id', '[0-9]+')->middleware('auth:api');
