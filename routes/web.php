<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Middleware\AuthCheck;

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


Route::get('/registration', [CustomAuthController::class,'registration'])->middleware('alreadyloggedin');

Route::post('/user/register', [CustomAuthController::class, 'userRegister']);

Route::get('/login', [CustomAuthController::class,'login'])->middleware('alreadyloggedin');

Route::post('/user/login', [CustomAuthController::class, 'userLogin']);

Route::get('dashboard', [CustomAuthController::class, 'dashBoard'])->middleware('IsloggedIn');

Route::get('/logout', [CustomAuthController::class, 'logOut']);