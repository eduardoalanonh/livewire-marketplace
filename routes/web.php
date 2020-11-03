<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',\App\Http\Livewire\Home::class)->name('home');
Route::get('/products/{id}',\App\Http\Livewire\Product::class)->name('single.product');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/product', \App\Http\Livewire\Admin\AdminProduct::class)->name('admin.product');
    Route::get('/admin', \App\Http\Livewire\Admin\AdminHome::class)->name('admin.home');
    Route::get('/profile', \App\Http\Livewire\Admin\Profile::class)->name('admin.profile');
    Route::get('/product/{id}', \App\Http\Livewire\Admin\AdminProductEdit::class)->name('admin.product.edit');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
