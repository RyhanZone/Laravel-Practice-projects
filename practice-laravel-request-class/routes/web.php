<?php

use App\Http\Controllers\FromController;
use Illuminate\Support\Facades\Route;

Route::get('/', FromController::class . '@index');
Route::post('/submit', FromController::class . '@submit');