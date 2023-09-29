<?php


use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CAdminController;
use App\Http\Controllers\Reviewer\ReviewerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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
Route::get('/',[HomeController::class, 'home']);


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/checkuser', [AuthenticatedSessionController::class, 'checkuser'])->name('checkuser');

    Route::middleware('IsAdmin')->prefix('admin')->group(function () {
        Route::get('dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
        //profile section control route start
        Route::get('profile',[AdminController::class, 'profile']);
        Route::post('profile/password_change',[AdminController::class, 'password_change']);
        Route::get('users',[AdminController::class, 'users']);
        //conferences control route start
        Route::get('conference',[ConferenceController::class, 'conferences'])->name('admin.conference');
        Route::post('conference_store',[ConferenceController::class, 'conference_store'])->name('admin.conference_store');
        Route::post('conference_update',[ConferenceController::class, 'conference_update'])->name('admin.conference_update');
        Route::post('conference_delete',[ConferenceController::class, 'conference_delete'])->name('admin.conference_delete');
        //category control route start
        Route::get('categories',[CategoryController::class, 'categories'])->name('admin.categories');
        Route::post('category_store',[CategoryController::class, 'category_store']);
        Route::post('category_update',[CategoryController::class, 'category_update']);
        Route::post('category_delete',[CategoryController::class, 'category_delete']);
    });

    Route::middleware('IsCadmin', 'verified')->prefix('conference-admin')->group(function () {
        Route::get('pannel',[CAdminController::class, 'admin']);
        Route::get('profile',[CAdminController::class, 'profile']);
    });

    Route::middleware('IsAuthor', 'verified')->prefix('author')->group(function () {
        Route::get('pannel',[AuthorController::class, 'author']);
        Route::get('profile',[AuthorController::class, 'profile']);
    });

    Route::middleware('IsReviewer', 'verified')->prefix('reviewer')->group(function () {
        Route::get('pannel',[ReviewerController::class, 'admin']);
        Route::get('profile',[ReviewerController::class, 'profile']);
    });
});


// Route::get('login',[AuthController::class, 'login']);
// Route::post('store_login',[AuthController::class, 'store_login']);
// Route::get('register',[AuthController::class, 'register']);

Route::get('/session', [HomeController::class, 'session'])->name('session');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
