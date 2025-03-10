<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/Dashboard-Panel', [AdminController::class, 'dashboard'])->name('Dashboard');
    Route::get('/Product', [ProductController::class, 'index'])->name('Product');
    Route::get('/Product-Add', [ProductController::class, 'create'])->name('add-Product');
    Route::post('/Product-Add', [ProductController::class, 'store'])->name('Product.store');
    Route::get("/Product/{id_product}", [ProductController::class, 'edit'])->name("Product.edit");
    Route::post("/Product/{id_product}", [ProductController::class, 'update'])->name("Product.update");
    Route::delete("/Product/{id_product}/delete", [ProductController::class, 'destroy'])->name("Product.delete");
});


// Route::get('/Dashboard-Panel', [AdminController::class, 'dashboard'])->name('Dashboard');
// Route::get('/Product', [ProductController::class, 'index'])->name('Product');
// Route::get('/Product-Add', [ProductController::class, 'create'])->name('add-Product');
// Route::post('/Product-Add', [ProductController::class, 'store'])->name('Product.store');
// Route::get("/Product/{id_product}", [ProductController::class, 'edit'])->name("Product.edit");
// Route::post("/Product/{id_product}", [ProductController::class, 'update'])->name("Product.update");
// Route::delete("/Product/{id_product}/delete", [ProductController::class, 'destroy'])->name("Product.delete");


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
