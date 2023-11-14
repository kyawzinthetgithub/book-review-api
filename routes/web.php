<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ReviewsController;

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
Route::redirect('/', 'loginpage');
Route::get('loginpage', function () {
    return view('login');
})->name('user#login');
Route::get('registerpage', function () {
    return view('register');
})->name('user#register');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/home',[BooksController::class,'homePage'])->name('home');
    Route::get('/details/{id}',[BooksController::class,'details'])->name('details');
    Route::post('/review',[ReviewsController::class,'review'])->name('book#review');
});
