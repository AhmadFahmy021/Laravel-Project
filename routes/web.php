<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MainPageController::class, 'index']);
Route::get('/detail/{id}',[UserController::class, 'show']);

Route::get('login', [AccountController::class, 'index_login'])->name('login')->middleware('guest');
Route::get('register', [AccountController::class, 'index_regis'])->middleware('guest');

Route::post('login', [AccountController::class, 'store_login']);
Route::post('register', [AccountController::class, 'store_regis']);
Route::get('logout', [AccountController::class, 'logout'])->middleware('auth');

Route::resource('dashboard/user', UserController::class)->middleware('user','auth');
Route::get('/dashboard/user/checkSlug', [UserController::class, 'checkSlug'])->middleware('auth');

// Route Admin
Route::get('dashboard/admin', [AdminController::class, 'index'])->middleware(['auth','admin']);
Route::get('dashboard/admin/pengguna', [AdminController::class, 'role'])->middleware(['auth','admin']);
Route::get('dashboard/admin/pengguna/{id}/edit', [AdminController::class, 'edit'])->middleware(['auth','admin']);
Route::post('dashboard/admin/pengguna/update/{id}', [AdminController::class, 'updated'])->middleware(['auth','admin']);
Route::get('dashboard/admin/pengguna/{id}/delete', [AdminController::class, 'delete_user'])->middleware(['auth','admin']);
Route::get('dashboard/admin/postingan', [AdminController::class, 'show'])->middleware(['auth','admin']);
Route::get('dashboard/admin/postingan/{id}/delete', [AdminController::class, 'delete_postingan'])->middleware(['auth','admin']);
