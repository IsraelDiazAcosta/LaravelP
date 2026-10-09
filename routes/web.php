<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Name;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contac', function () {
    $name='Israel';
    $age= 22;

    $data=['name'=>$name,'age'=>$age];
    return view('contact',$data);
})->name('p1');


Route::get('/contac1', function () {
    $name2='Elvio';
    $age2= 21;

    $data2=['name2'=>$name2,'age2'=>$age2];
    return view('contact1',$data2);
})->name('p2');

