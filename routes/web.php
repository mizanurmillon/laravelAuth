<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/insert-post',[PostController::class,'store']);
Route::get('/all.post',[PostController::class,'AllPost'])->name('all.post');
Route::get('/delete-post/{id}',[PostController::class,'Delete']);
Route::get('/edit-post/{id}',[PostController::class,'Edit']);
Route::post('/update-post/{id}',[PostController::class,'Update']);