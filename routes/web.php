<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
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

Route::get('/index/{localization?}',[IndexController::class, 'index'])->name('index')->middleware('guest');

Route::get('/login/{localization?}', [AuthController::class, 'loginPage'])->name('loginPage')->middleware('guest');
Route::get('/register/{localization?}', [AuthController::class, 'registerPage'])->name('registerPage')->middleware('guest');

Route::post('/login/{localization?}',[AuthController::class, 'login'])->name('login');
Route::post('/register/{localization?}', [AuthController::class, 'register'])->name('register');

Route::get('/logout/{localization?}',[AuthController::class, 'logout'])->middleware('UserAdminMiddleware');

Route::get('/{localization?}', [HomeController::class, 'index'])->name('home')->middleware('UserAdminMiddleware');

Route::get('/bookDetail/{id}/{localization?}',[HomeController::class, 'bookDetail'])->middleware('UserAdminMiddleware');
Route::get('/rent/{id}/{book_id}/{localization?}',[HomeController::class, 'rent'])->middleware('UserAdminMiddleware');

Route::get('cart/{id}/{localization?}',[CartController::class, 'index'])->middleware('UserAdminMiddleware');
Route::get('/deleteItemCart/{order_id}/{localization?}',[CartController::class, 'deleteItemCart'])->middleware('UserAdminMiddleware');
Route::get('/cartSubmit/{id}/{localization?}',[CartController::class, 'cartSubmit'])->middleware('UserAdminMiddleware');

Route::get('/profilePage/{localization?}',[AccountController::class, 'profile'])->middleware('UserAdminMiddleware');
Route::post('/updateProfile/{id}/{localization?}',[AccountController::class, 'updateProfile'])->middleware('UserAdminMiddleware');

Route::get('/maintainPage/{localization?}',[AccountController::class, 'maintainPage'])->middleware('AdminMiddleware');
Route::get('/updateRole/{id}/{localization?}',[AccountController::class, 'updateRolePage'])->middleware('AdminMiddleware');
Route::get('/deleteAccount/{id}/{localization?}',[AccountController::class, 'deleteAccount'])->middleware('AdminMiddleware');
Route::post('/updateAccount/{id}/{localization?}',[AccountController::class, 'updateAccount'])->middleware('AdminMiddleware');