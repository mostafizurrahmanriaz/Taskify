<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Provider\ProviderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('check.auth');

//authentication
Route::view('/registration', 'auth/registration')->name('signUp')->middleware('check.auth');
Route::post('/sign-up', [AuthController::class, 'register'])->name('registerSave');
Route::view('/login', 'auth/login')->name('login')->middleware('check.auth');
Route::post('/sign-in', [AuthController::class, 'login'])->name('loginSave');

Route::middleware('auth')->group(function(){



    //provider routes
    Route::middleware(['provider', 'valid.role:provider'])->group(function(){
        // setap page(no provider setup here)
        Route::middleware('provider.check')->group(function(){
        Route::post('/provider/setup', [ProviderController::class, 'setupProfile'])->name('save.provider');
        Route::view('/provider/setup', 'provider/register')->name('setup.provider');
        });

        // Protected Routes (setup required)
        Route::middleware('provider.setup')->group(function(){
        Route::get('/provider/dashboard', [ProviderController::class, 'ProviderDashboard'])->name('provider.dashboard'); 
        //booking   
        Route::get('/provider/bookings', [BookingController::class, 'bookings'])->name('provider.bookings');    
        Route::get('/provider/all-booking', [BookingController::class, 'allBooking'])->name('provider.allbooking');    
        Route::get('/provider/bookings/{id}', [BookingController::class, 'view'])->name('provider.booking.view');    
        Route::get('provider/booking/view__data/{id}', [BookingController::class, 'info'])->name('provider.booking.info');    
        Route::PUT('provider/booking/{id}', [BookingController::class, 'updateBooking'])->name('provider.booking.update');    

        //services
        Route::get('/provider/services', [ServiceController::class, 'index'])->name('provider.services');   
        Route::get('/provider/services/create', [ServiceController::class, 'create'])->name('provider.services.create'); 
        Route::post('/provider/services/store', [ServiceController::class, 'store'])->name('provider.services.store');
        Route::get('/provider/services/edit/{id}', [ServiceController::class, 'edit'])->name('provider.services.edit'); 
        Route::post('/provider/services/update/{id}', [ServiceController::class, 'update'])->name('provider.services.update');
        Route::get('/provider/services/delete/{id}', [ServiceController::class, 'destroy'])->name('provider.services.delete');


   
        });
    });

        //user routes
        Route::middleware('valid.role:user')->group(function(){
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

        Route::get('/user/service-details/{id}', [UserController::class, 'serviceDatails'])->name('services.details');
        Route::post('/user/booking-service', [UserController::class, 'bookingService'])->name('save.booking');
        Route::get('/user/my-bookings', [UserController::class, 'bookinghistory'])->name('booking.history');
        Route::get('/user/my-bookings/{id}', [UserController::class, 'view'])->name('booking.view');

        });
        



        //logout
        Route::get('/logout', [AuthController::class, 'logOut'])->name('logout');

});