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

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/',\App\Http\Livewire\Home::class);

Route::get('/product',\App\Http\Livewire\Admin\AdminProduct::class)->name('admin.product');

Route::get('/admin', \App\Http\Livewire\Admin\AdminHome::class)->name('admin.home');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
