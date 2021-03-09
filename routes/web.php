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

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'welcome']);
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function(){
    Route::get('/',[\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});
Route::group(['prefix' => 'libraries', 'middleware' => ['auth']], function(){
    Route::post('/{id?}',[\App\Http\Controllers\LibrariesController::class, 'storeLibraries'])->name('store.libraries');
    Route::get('/delete/{id}',[\App\Http\Controllers\LibrariesController::class, 'deleteLibraries'])->name('delete.libraries');
});
Route::group(['prefix' => 'books', 'middleware' => ['auth']], function(){
    Route::post('/{id?}',[\App\Http\Controllers\BooksController::class, 'storeBooks'])->name('store.books');
    Route::get('/delete/{id}',[\App\Http\Controllers\BooksController::class, 'deleteBooks']);
});
require __DIR__.'/auth.php';
