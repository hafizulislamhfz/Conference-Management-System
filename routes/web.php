<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/',[AuthController::class, 'all']);
Route::get('login',[AuthController::class, 'login']);
Route::post('store_login',[AuthController::class, 'store_login']);
Route::get('register',[AuthController::class, 'register']);

Route::get('admin-pannel',[AdminController::class, 'admin']);
Route::get('admin-profile',[AdminController::class, 'profile']);

Route::get('conference-admin-pannel',[CAdminController::class, 'admin']);
Route::get('conference-admin-profile',[CAdminController::class, 'profile']);

Route::get('author-pannel',[AuthorController::class, 'author']);
Route::get('author-profile',[AuthorController::class, 'profile']);

Route::get('reviewer-pannel',[ReviewerController::class, 'admin']);
Route::get('reviewer-profile',[ReviewerController::class, 'profile']);
