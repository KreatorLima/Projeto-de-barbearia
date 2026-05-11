<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/recuperar', function() {
    return view('auth.recover');
})->name('auth.recover');

Route::get('/registro', function(){
    return view('auth.register');
})->name('auth.register');

//------------------------------------------------------------------------------
