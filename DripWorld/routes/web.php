<?php

use App\Http\Controllers\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [HomeController::class, 'index']);


// Login / Register routes
Route::get('/login', [UserController::class, "showLoginPage"]);
Route::post('/login', [UserController::class, "login"]);
Route::get('/register', [UserController::class, "showRegisterPage"]);
Route::post('/register', [UserController::class, "register"]);
Route::post('/logout', [UserController::class, "logout"]);

// Profile routes
Route::get('/profile/{id}', [UserController::class, "showProfilePage"]);
Route::get('/profile/{user_id}/edit', [UserController::class, "showEditProfileForm"]);
Route::put('/profile/{user_id}', [UserController::class, "actuallyUpdateProfile"]);
Route::get('/manage-avatar', [UserController::class, 'showAvatarForm']);
Route::post('/manage-avatar', [UserController::class, 'storeAvatar']);

Route::get('/sell', [SellController::class, 'showSellForm']);
Route::post('/sell', [SellController::class, 'actuallySell']);
Route::get('/sell/for-sale', [SellController::class, 'showForSellPage']);