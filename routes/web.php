<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Name;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return view('test');
});


Route::get('/crud', function () {
    $age= 22;
    $data = ['name' =>'Israel','age' =>$age];
    return view('crud/index',$data);
})->name('crud');
