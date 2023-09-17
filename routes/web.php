<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashHomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/dashboard',[DashHomeController::Class,'index'])->name('/dashboard');

Route::get('/add-product',[ProductController::Class,'addProduct'])->name('/add-product');
Route::get('/product-list',[ProductController::Class,'productList'])->name('/product-list');
Route::get('/edit-product',[ProductController::Class,'editProduct'])->name('/edit-product');
Route::get('/add-category',[ProductController::Class,'addCategory'])->name('/add-category');
Route::get('/category-list',[ProductController::Class,'categoryList'])->name('/category-list');
Route::get('/add-brand',[ProductController::Class,'addBrand'])->name('/add-brand');

Route::get('/edit-category',[ProductController::Class,'editCategory'])->name('/edit-category');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
