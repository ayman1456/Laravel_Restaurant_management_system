<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');
