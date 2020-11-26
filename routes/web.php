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

Auth::routes();

/* API for form */
Route::post('/id/{id}/edit/', [App\Http\Controllers\HomeController::class, 'editPost'])->name('edit.post')->middleware('auth');
Route::post('/add/post/', [App\Http\Controllers\HomeController::class, 'addPost'])->name('add.post')->middleware('auth');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add/', [App\Http\Controllers\HomeController::class, 'add'])->name('add')->middleware('auth');
Route::get('/id/{id}/', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit')->middleware('auth');
Route::get('/id/{id}/delete', [App\Http\Controllers\HomeController::class, 'delete'])->middleware('auth');


