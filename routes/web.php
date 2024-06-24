<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MobilRentController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index']);

Route::middleware('only_guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});


Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);


    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');



    Route::middleware('only_admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index']);

        Route::get('mobil', [MobilController::class, 'index']);
        Route::get('mobil-add', [MobilController::class, 'add']);
        Route::post('mobil-add', [MobilController::class, 'store']);
        Route::get('mobil-edit/{slug}', [MobilController::class, 'edit']);
        Route::post('mobil-edit/{slug}', [MobilController::class, 'update']);
        Route::get('mobil-delete/{slug}', [MobilController::class, 'delete']);
        Route::get('mobil-destroy/{slug}', [MobilController::class, 'destroy']);
        Route::get('mobil-deleted', [MobilController::class, 'deletedMobil']);
        Route::get('mobil-restore/{slug}', [MobilController::class, 'restore']);


        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('category-add', [CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'store']);
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
        Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
        Route::get('category-deleted', [CategoryController::class, 'deletedCategory']);
        Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);

        Route::get('users', [UserController::class, 'index']);
        Route::get('registered-users', [UserController::class, 'registeredUser']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        Route::get('user-blok/{slug}', [UserController::class, 'delete']);
        Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
        Route::get('user-banned', [UserController::class, 'bannedUser']);
        Route::get('user-restore/{slug}', [UserController::class, 'restore']);

        Route::get('mobil-rent', [MobilRentController::class, 'index']);
        Route::post('mobil-rent', [MobilRentController::class, 'store']);

        Route::get('rent_logs', [RentLogController::class, 'index']);

        Route::get('mobil-return', [MobilRentController::class, 'returnMobil']);
        Route::post('mobil-return', [MobilRentController::class, 'saveReturnMobil']);

    });





});

