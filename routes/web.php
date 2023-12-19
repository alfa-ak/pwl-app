<?php

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
    return view('adminlte');
})->name('hello');

// Route::get('/user', function () {
//     return view('user');
// });

Route::get('/product', [ProductController::class, 'index'])->name('index.product');
Route::get('/product/create', [ProductController::class, 'create'])->name('create.product');
Route::post('/product/store', [ProductController::class, 'store'])->name('store.product');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('edit.product');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('update.product');
Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy.product');
