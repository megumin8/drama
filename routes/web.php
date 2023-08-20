<?php

use Auth0\Laravel\Facade\Auth0;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dasboardController;
use App\Http\Controllers\DramaController;
use App\Http\Controllers\HomeController;
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


Route::get('/',[HomeController::class,'index'] )->name('client_home');
Route::post('/search',[HomeController::class,'search'] )->name('search');
Route::middleware(['auth'])->group(function () {
    Route::get('/home',[DramaController::class , 'index'])->name('home');
    Route::get('deletedrama/{id}', [DramaController::class,'delete'])->name('deletedrama');
    Route::post('/addDrama', [DramaController::class,'addNew'])->name('addDrama');
    Route::post('/editDrama', [DramaController::class,'edit'])->name('editDrama');



});




