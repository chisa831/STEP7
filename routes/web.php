<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Auth::routes();

Route::post('/register','LoginController@login')->name('register');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', [App\Http\Controllers\ProductController::class,'home'])->name('home');
Route::get('/home', [App\Http\Controllers\ProductController::class,'home'])->name('home');

Route::get('/search', [App\Http\Controllers\ProductController::class,'search'])->name('search');
Route::get('/create', [App\Http\Controllers\ProductController::class,'create'])->name('create');
Route::post('/create', [App\Http\Controllers\ProductController::class,'createSubmit'])->name('submit');
Route::get('/show/{id}', [App\Http\Controllers\ProductController::class,'show'])->name('show');
Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class,'edit'])->name('edit');
Route::post('/edit/{id}',[App\Http\Controllers\ProductController::class,'update'])->name('update');
Route::post('/delete{id}',[App\Http\Controllers\ProductController::class,'delete'])->name('delete');
