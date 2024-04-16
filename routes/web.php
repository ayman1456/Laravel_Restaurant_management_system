<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;

Route::get('/', function () {
    return view('frontend.Homapage');
});

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard')->middleware('role:admin');

    // Category Routes
    Route::get('/category', [CategoryController::class, 'showCategory'])->name('category.show');
    Route::get('/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
    Route::post('/category/{id?}', [CategoryController::class, 'saveCategory'])->name('category.save');
    Route::get('/category-delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');

    //Food routes
    Route::get('/food', [FoodController::class, 'showFood'])->name('food.show');
    Route::post('/food/{id?}', [FoodController::class, 'saveFood'])->name('food.save');
    Route::get('/food/edit/{id}', [FoodController::class, 'editFood'])->name('food.edit');
    Route::get('/food-delete/{id}', [FoodController::class, 'deleteCategory'])->name('food.delete');
});
