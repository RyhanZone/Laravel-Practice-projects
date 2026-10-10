<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.home');
});
Route::get('/about', function () {
    return view('layout.about');
});
Route::get('/contact', function () {
    return view('layout.contact');
});
Route::get('/services', function () {
    return view('layout.services');
});