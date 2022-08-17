<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/', [LandingController::class, 'landing_page']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'dashboard_page'])->name('index');
        // User profile
        Route::get('/profile', [ProfileController::class, 'profile_page'])->name('user.profile');
        Route::post('/profile/{user?}', [ProfileController::class, 'update_profile'])->name('user.profile.update');
        // Users
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', [UserController::class, 'users_list'])->name('list');
            Route::get('/create', [UserController::class, 'create_user'])->name('create');
            Route::post('/store', [UserController::class, 'store_user'])->name('store');
            Route::get('/edit/{user}', [UserController::class, 'edit_user'])->name('edit');
            // Route::post('/update', [UserController::class, 'update_user'])->name('update');
            Route::get('/delete/{user}', [UserController::class, 'delete_user'])->name('delete');
        });
    });
});
