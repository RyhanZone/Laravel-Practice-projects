<?php

use App\Http\Controllers\EmployController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('employs.index');
});
Route::resource('employs', EmployController::class);