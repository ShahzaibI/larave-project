<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
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

// Route::get('/login', [UserController::class, 'login'])->name('login');
// Route::get('/register', [UserController::class, 'register'])->name('register');
// Route::POST('/user-store', [UserController::class, 'store'])->name('store');

Route::get('/', function () {
    return view('index');
})->name('home');
// user
Route::group(['prefix'=>'user'],function(){
    Route::get('/login', [UserController::class, 'loginPage'])->name('loginUser');
    Route::get('/register', [UserController::class, 'register'])->name('registerUser');
    Route::post('/user-store', [UserController::class, 'store'])->name('storeUser');
    Route::post('/user-login', [UserController::class, 'login'])->name('loginAuth');
    Route::get('/user-logout', [UserController::class, 'logout'])->name('logoutAuth');
    // Reset Password
    Route::get('/reset-password', [UserController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/update-password', [UserController::class, 'updatePassword'])->name('updatePassword');
    // Forgot password
    Route::get('/forgot-password', [UserController::class, 'forgotPassword'])->name('forgotPassword');

    Route::post('/forgot-password-email', [UserController::class, 'forgotPasswordEmail'])->name('forgotPasswordEmail');

    Route::get('/reset-password/{token}',[UserController::class, 'resetForm'])->name('password.reset');

    Route::post('/change-password',[UserController::class, 'changePassword'])->name('password.update');
});
// product
Route::group([ 'prefix'=>'product', 'middleware'=>'custom_auth'],function(){
    Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboardProduct');
    Route::get('/show', [ProductController::class, 'index'])->name('showProduct');
    Route::get('/create', [ProductController::class, 'create'])->name('createProduct');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('editProduct');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('updateProduct');
    Route::post('/store', [ProductController::class, 'store'])->name('storeProduct');
    Route::get('/archive', [ProductController::class, 'archive'])->name('showArchiveProduct');
    Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');
    Route::get('/unArchive/{id}', [ProductController::class, 'unArchive'])->name('unArchiveProduct');
    Route::get('/search', [ProductController::class, 'search'])->name('searchProduct');
});

Route::group(['prefix'=>'order', 'middleware'=>'custom_auth'], function(){
    Route::get('/show', [OrderController::class, 'index'])->name('showOrder');
    Route::get('/send-email', [OrderController::class, 'sendEmail'])->name('sendEmail');
});
