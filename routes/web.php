<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AuthController;
use Illuminate\Auth\SessionGuard;
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

Route::get('/', [Controller::class, 'index'])->middleware(['auth'])->name('home');

//login
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login');


//register
Route::get('/register', [Controller::class, 'getRegister'])->name('register');
Route::post('/register', [Controller::class, 'postRegister'])->name('register');

//logout
Route::get('/logout', [Controller::class, 'getLogout'])->name('logout');

// iklan
Route::get('/iklan', [IklanController::class, 'index'])->name('iklan');
Route::get('/iklan/create', [IklanController::class, 'create'])->name('iklan_create');
Route::post('/iklan/store', [IklanController::class, 'store'])->name('iklan_store');
Route::get('/iklan/delete/{id}', [IklanController::class, 'delete'])->name('iklan_delete');
Route::get('/iklan/update/{id}', [IklanController::class, 'update'])->name('iklan_update');
Route::post('/iklan/edit/{id}', [IklanController::class, 'edit'])->name('iklan_edit');
