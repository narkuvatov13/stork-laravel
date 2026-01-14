<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::fallback(function () {
    return view('livewire.stork.pages.not-founded.not-founded');
});
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Catagories
    Route::prefix('/category')->group(function () {
        Route::get('/lists', [CategoryController::class, 'index'])->name('category-lists');
    });
});

require __DIR__ . '/settings.php';
