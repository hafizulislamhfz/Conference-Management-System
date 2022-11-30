<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CAdminController;
use App\Http\Controllers\ReviewerController;
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

Route::get('/',[HomeController::class, 'all']);

Route::get('login',[AuthController::class, 'login']);
Route::post('store_login',[AuthController::class, 'store_login']);
Route::get('register',[AuthController::class, 'register']);

Route::prefix('admin')->group(function () {
    Route::get('pannel',[AdminController::class, 'admin']);
    Route::get('profile',[AdminController::class, 'profile']);
    Route::get('users',[AdminController::class, 'users']);
    Route::get('categories',[AdminController::class, 'categories']);
    Route::post('category_store',[AdminController::class, 'category_store']);
    Route::post('category_update',[AdminController::class, 'category_update']);
    Route::get('category_delete/{id}',[AdminController::class, 'category_delete']);
});

Route::prefix('conference-admin')->group(function () {
    Route::get('pannel',[CAdminController::class, 'admin']);
    Route::get('profile',[CAdminController::class, 'profile']);
});

Route::prefix('author')->group(function () {
    Route::get('pannel',[AuthorController::class, 'author']);
    Route::get('profile',[AuthorController::class, 'profile']);
});

Route::prefix('reviewer')->group(function () {
    Route::get('pannel',[ReviewerController::class, 'admin']);
    Route::get('profile',[ReviewerController::class, 'profile']);
});

