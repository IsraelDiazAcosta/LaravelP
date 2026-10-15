<?php

use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\PrimerControlador;
use App\Http\Controllers\SegundoControlador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', [PrimerControlador::class, 'index']);
Route::get('otro/{post}', [PrimerControlador::class, 'otro']);
Route::get('test2', [SegundoControlador::class, 'index']);

Route::resource('post', PostController::class);
Route::resource('category', CategoryController::class);