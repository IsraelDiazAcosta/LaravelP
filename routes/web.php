<?php

use App\Http\Controllers\PrimerControlador;
use App\Http\Controllers\SegundoControlador;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Name;

Route::get('/', function () {
    return view('welcome');
});
Route::get('test',[PrimerControlador::class,'index']);
Route::get('otro/{post}',[PrimerControlador::class,'otro']);
Route::get('test2',[SegundoControlador::class,'index']);
