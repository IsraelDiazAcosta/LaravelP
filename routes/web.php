<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\web\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('dashboard')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resources([
            'post' => PostController::class,
            'category' => CategoryController::class,
        ]);
    });
Route::prefix('blog')
    ->controller(BlogController::class)
    ->group(function () {
        Route::get('/', 'index')->name('blog.index');
        Route::get('/{post}', 'show')->name('blog.show');
    });

require __DIR__.'/auth.php';
