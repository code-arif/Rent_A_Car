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
use App\Http\Controllers\Admin\RentalManageController;
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

        //manage car details
        Route::get('/details/save/{id?}', [CarManageController::class, 'showSaveCarDetailsPage'])->name('show.save.car.details.page');
        Route::post('/details/save', [CarManageController::class, 'saveCarDetails'])->name('save.car.details');
        Route::post('/details/update', [CarManageController::class, 'updateCarDetails'])->name('update.car.details');
    });

    //====================customer management=====================//
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/list', [CustomerController::class, 'showCustomerList'])->name('show.customer.list');
        Route::delete('/delete/{id}', [CustomerController::class, 'deleteCustomer'])->name('delete.customer');
        Route::get('/rent/history/{id}', [CustomerController::class, 'rentalHistoryForThisCustomer'])->name('show.rental.history.for.cus');
    });

    //=======================rental management=====================//
    Route::group(['prefix' => 'rental'], function () {
        Route::get('/list', [RentalManageController::class, 'showRentalList'])->name('show.rental.list');
        Route::get('/save/{id?}', [RentalManageController::class, 'showRentalSave'])->name('show.rental.save');
        Route::post('/store', [RentalManageController::class, 'rentalStore'])->name('store.rental');
        Route::post('/update/{id}', [RentalManageController::class, 'updateRental'])->name('update.rental');
        Route::delete('/delete/{id}', [RentalManageController::class, 'deleteRental'])->name('delete.rental');
        Route::put('/status-change/{id}', [RentalManageController::class, 'changRentalStatus'])->name('change.rental.status');
    });

    //========================rental details ======================//
    Route::get('rent/details/{id}', [RentalManageController::class, 'showRentDetails'])->name('show.order.details');
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

// ===========================Home page===========================//
Route::get('/', [HomeController::class, 'index'])->name('show.home');

//===========================Car Route===========================//
Route::get('/cars', [CarController::class, 'CarPage'])->name('car.page');
Route::get('/car-details/{id}', [CarController::class, 'showCarDetails'])->name('show.car.details');

//===========================about page =============================//
Route::get('/about', [AboutController::class, 'about'])->name('show.about');

//============================Contact Page ==========================//
Route::get('/contact', [ContactController::class, 'contact'])->name('show.contact');

//============================Reltal Route===========================//
Route::group(['middleware' => UserAuthMiddleware::class], function () {
    Route::post('/create/rent', [RentalController::class, 'createRent'])->name('create.rent');
    Route::get('/rental/success', [RentalController::class, 'rentalSuccess'])->name('rental.success');

    //==========================User Dashboard===========================//
    Route::get('/booking/history/{id}', [UserDashboardController::class, 'showBookingHistory'])->name('show.booking.history');
    Route::patch('/rental/cancel/{id}', [UserDashboardController::class, 'cancelBooking'])->name('rental.cancel');
    Route::get('/user/profile/{id}', [UserDashboardController::class,'showUserProfile'])->name('show.user.profile');
    Route::post('/update/user/profile', [UserDashboardController::class,'updateUserProfile'])->name('update.user.profile');
    Route::post('/update/user/password', [UserDashboardController::class,'updateUserPassword'])->name('update.user.password');
});


//404 page
Route::fallback(function () {
    return Inertia::render('Frontend/404Page'); // Render 404 component
});