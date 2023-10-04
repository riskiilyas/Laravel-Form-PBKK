<?php

use App\Http\Controllers\MyControllerFull;
use App\Http\Controllers\RegisterController;
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
Route::get('/', [RegisterController::class, 'home'])->name('register.home');
Route::get('/register', [RegisterController::class, 'index'])->name('register.view');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
