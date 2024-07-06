<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
use App\Http\Middleware\UserOnly;
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

Route::get('/', function () {
    return view('login');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'showLogin')->name('showLogin');
    Route::post('/login-user', 'loginUser')->name('loginUser');
    Route::get('/register', 'showRegister')->name('showRegister');
    Route::post('/register-user', 'registerUser')->name('registerUser');
    Route::post('/logout', 'logout')->name('logout')->middleware(UserOnly::class);
});

Route::controller(CrudController::class)->group(function() {
    Route::middleware(UserOnly::class)->group(function() {
        Route::get('/home', 'showHome')->name('showHome');
        Route::get('/create', 'showCreate')->name('showCreate');
        Route::post('/save-info', 'saveInfo')->name('saveInfo');
        Route::get('/{info}/edit', 'showEdit')->name('showEdit');
        Route::put('/{info}/update-info', 'updateInfo')->name('updateInfo');
        Route::delete('/{info}/delete', 'delete')->name('delete');
    });
});