<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\TableController;
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


    //pos routes
    Route::get('/pos', [PosController::class, 'pos'])->name('pos.show');
    Route::get('/add-food', [PosController::class, 'storeFood'])->name('pos.store');


    //* ORDER ROUTES
    Route::post('/orders', [PosController::class, 'confirmOrder'])->name('pos.confirm.order');

    //table routes
    Route::get('/table', [TableController::class, 'table'])->name('table.show');
    Route::get('/table/edit/{id}', [TableController::class, 'editTable'])->name('table.edit');
    Route::post('/table/{id?}', [TableController::class, 'saveTable'])->name('table.save');
    Route::get('/table-delete/{id}', [TableController::class, 'deleteTable'])->name('table.delete');
});
