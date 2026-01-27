<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('welcome', function () {
    return view('welcome');
})->name('home');


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
})->name('login');

Route::fallback(function () {
    return view('livewire.stork.pages.not-founded.not-founded');
});

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Categories
    Route::livewire('/categories', 'pages::categories.index')->name('categories.index');

    Route::livewire('/categories/create', 'pages::categories.create')->middleware('can:create categories')->name('categories.create');

    Route::livewire('/categories/{category}/edit', 'pages::categories.edit')->name('categories.edit');

    // Users
    Route::livewire('/users', 'pages::users.index')->name('users.index');

    Route::livewire('/users/create', 'pages::users.create')->middleware('can:create users')->name('users.create');

    Route::livewire('/users/{user}/edit', 'pages::users.edit')->name('users.edit');

    // Catagories
    // Route::prefix('/categories')->name('categories.')->group(function () {
    //     Route::get('/list', [CategoryController::class, 'index'])->name('index');
    // });
    //     | URL                  | Route name          |
    // | -------------------- | ------------------- |
    // | GET /categories      | `categories.index`  |
    // | POST /categories     | `categories.store`  |
    // | GET /categories/{id} | `categories.show`   |
    // | PUT /categories/{id} | `categories.update` |
    // Route::resource('categories', CategoryController::class);


});

require __DIR__ . '/settings.php';
