<?php

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CarController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\RentalController;

//=================================ADMIN ROUTES=================================//
//admin login
Route::get('/admin/login', [AdminAuthController::class, 'ShowAdminLogin'])->name('show.admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'AdminLogin'])->name('admin.login');




/*================================
Frontend Route
================================*/
//===========================user login registraion================//
Route::get('/user/login', [AuthController::class, 'ShowUserLogin'])->name('show.user.login');
Route::post('/user/login', [AuthController::class, 'UserLogin'])->name('user.login');
Route::get('/user/registration', [AuthController::class, 'ShowUserRegistration'])->name('show.user.registration');
Route::post('/user/registration', [AuthController::class, 'UserRegistration'])->name('user.registration');


//===========================Car Route===========================//
Route::get('/cars', [CarController::class, 'CarPage'])->name('car.page');

// ===========================Home page===========================//
Route::get('/',[HomeController::class, 'index'])->name('show.home');

//===========================about page =============================//
Route::get('/about',[AboutController::class,'about'])->name('show.about');

//============================Contact Page ==========================//
Route::get('/contact',[ContactController::class, 'contact'])->name('show.contact');

//============================Reltal Route===========================//
Route::get('/car-details',[RentalController::class, 'showCarDetails'])->name('show.car.details');


