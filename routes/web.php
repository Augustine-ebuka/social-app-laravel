<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ideaController;
use App\Http\Controllers\testController;
use App\Http\Controllers\DasboardController;
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

Route::get('/dashboard', [DasboardController::class, 'index'])->name('dashboard');
Route::post('/idea', [ideaController::class, 'store'])->name('idea.create');
Route::get('/idea/{idea}', [ideaController::class, 'show'])->name('idea.show');
Route::get('/idea/{idea}/edit', [ideaController::class, 'edit'])->name('idea.edit');
Route::put('/idea/{idea}/edit', [ideaController::class, 'update'])->name('idea.update');
Route::delete('/idea/{idea}/comments', [ideaController::class, 'delete'])->name('idea.destroy');

Route::post('/idea/{idea}/comment', [CommentController::class, 'store'])->name('idea.comment.store');

// terms
Route::get('/terms', function () {
    return view('terms');
});
