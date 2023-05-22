<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/add', [CategoryController::class, 'store'])->name('category.create.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/category/update/{id}', [CategoryController::class, 'update'])->name('category.edit.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.index.destroy');

    Route::get('/post', [PostController::class, 'index']);
    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post/store', [PostController::class, 'store'])->name('post.create.store');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/update/{id}', [PostController::class, 'update'])->name('post.edit.update');
    Route::get('/post/dalate/{id}', [PostController::class, 'destroy'])->name('post.index.destroy');
});