<?php

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\Frontend\CarController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CarManageController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Middleware\UserAuthMiddleware;

/*================================
Admin Route
================================*/
//=================================ADMIN ROUTES=================================//
//admin login
Route::get('/admin/login', [AdminAuthController::class, 'ShowAdminLogin'])->name('show.admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'AdminLogin'])->name('admin.login');

//=================================Admin Dashboard route =================================//
Route::group(['middleware' => AdminAuthMiddleware::class], function () {
    Route::get('admin/dashboard', [AdminDashboardController::class, 'showAdminDashboard'])->name('show.admin.dashboard');
    Route::get('admin/logout', [AdminAuthController::class, 'AdminLogout'])->name('admin.logout');

    //====================car management=====================//
    Route::group(['prefix' => 'car'], function () {
        Route::get('/list', [CarManageController::class, 'showCarList'])->name('show.car.list');
        Route::get('/save/{id?}', [CarManageController::class, 'showCarSave'])->name('show.car.save');
        Route::post('/store', [CarManageController::class, 'carStore'])->name('store.car');
        Route::post('/update/{id}', [CarManageController::class, 'updateCar'])->name('update.car');
        Route::post('/delete/{id}', [CarManageController::class, 'deleteCar'])->name('delete.car');
        Route::post('/status-change/{id}', [CarManageController::class, 'changeCarStatus'])->name('change.car.status');
    });

    //====================customer management=====================//
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/list', [CustomerController::class, 'showCustomerList'])->name('show.customer.list');
        Route::post('/delete/{id}', [CarManageController::class, 'deleteCustomer'])->name('delete.customer');
    });
});

/*================================
Frontend Route
================================*/
//===========================user login registraion================//
Route::get('/user/login', [AuthController::class, 'ShowUserLogin'])->name('show.user.login');
Route::post('/user/login', [AuthController::class, 'UserLogin'])->name('user.login');
Route::get('/user/registration', [AuthController::class, 'ShowUserRegistration'])->name('show.user.registration');
Route::post('/user/registration', [AuthController::class, 'UserRegistration'])->name('user.registration');
Route::get('/user/logout', [AuthController::class, 'UserLogout'])->name('user.logout');

//===========================Car Route===========================//
Route::get('/cars', [CarController::class, 'CarPage'])->name('car.page');

// ===========================Home page===========================//
Route::get('/', [HomeController::class, 'index'])->name('show.home');

//===========================about page =============================//
Route::get('/about', [AboutController::class, 'about'])->name('show.about');

//============================Contact Page ==========================//
Route::get('/contact', [ContactController::class, 'contact'])->name('show.contact');

//============================Reltal Route===========================//
Route::get('/car-details', [RentalController::class, 'showCarDetails'])->name('show.car.details');

//==========================User Dashboard===========================//
Route::get('/user/dashboard', [UserDashboardController::class, 'showUserDashboard'])
    ->name('show.user.dashboard')
    ->middleware(UserAuthMiddleware::class);
