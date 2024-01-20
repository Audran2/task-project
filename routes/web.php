<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CalendarController;

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

Route::get('/', [CalendarController::class, 'index'])->name('home');

Route::prefix('task')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('task.index');
    Route::get('/new', [TaskController::class, 'create'])->name('task.create');
    Route::post('/new', [TaskController::class, 'store'])->name('task.store');
    Route::get('/{slug}', [TaskController::class, 'show'])->name('task.show');
    Route::get('/{slug}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/{slug}/edit', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/{slug}', [TaskController::class, 'destroy'])->name('task.destroy');
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/new', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/new', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{slug}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/{slug}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/{slug}/edit', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{slug}', [CategoryController::class, 'destroy'])->name('category.destroy');
});
