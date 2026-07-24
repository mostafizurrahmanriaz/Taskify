<?php


use App\Http\Controllers\Provider\ProviderController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home/index');
})->name('home');

//authentication
Route::view('/registration', 'auth/registration')->name('signUp')->middleware('already.login');
Route::post('/sign-up', [AuthController::class, 'register'])->name('registerSave');
Route::view('/login', 'auth/login')->name('login')->middleware('already.login');
Route::post('/sign-in', [AuthController::class, 'login'])->name('loginSave');

Route::middleware('auth')->group(function(){



    //provider routes
    Route::middleware('provider')->group(function(){
        // setap page(no provider setup here)
        Route::middleware('provider.check')->group(function(){
        Route::post('/provider/setup', [ProviderController::class, 'setupProfile'])->name('save.provider');
        Route::view('/provider/setup', 'provider/register')->name('setup.provider');
        });

        // Protected Routes (setup required)
        Route::middleware('provider.setup')->group(function(){
        Route::get('/provider/dashboard', [ProviderController::class, 'ProviderDashboard'])->name('provider.dashboard');        
        });
    });

        //user routes
        
        Route::get('/user/dashboard', [ProviderController::class, 'UserDashboard'])->name('user.dashboard');


});