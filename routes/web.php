<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\RegisterController;

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
    Route::get('/remove-food/{id}', [PosController::class, 'removeFood'])->name('pos.remove');

    //* ORDER ROUTES
    Route::post('/orders', [PosController::class, 'confirmOrder'])->name('pos.confirm.order');
    Route::get('/invoice-view/{order}', [PosController::class, 'invoiceView'])->name('invoice.view');
    Route::get('/invoice-download/{order}', [PosController::class, 'invoiceOrder'])->name('invoice.download');

    //table routes
    Route::get('/table', [TableController::class, 'table'])->name('table.show');
    Route::get('/table/edit/{id}', [TableController::class, 'editTable'])->name('table.edit');
    Route::post('/table/{id?}', [TableController::class, 'saveTable'])->name('table.save');
    Route::get('/table-delete/{id}', [TableController::class, 'deleteTable'])->name('table.delete');
});








//* FRONTEND ROUTES

Route::get('/sign-in', [LoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/sign-in', [LoginController::class, 'login'])->name('user.login.verify');
Route::get('/sign-up', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/sign-up', [RegisterController::class, 'register'])->name('user.register.verify');
Route::get('/sign-out', [LoginController::class, 'logout'])->name('user.logout');
