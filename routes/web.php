<?php


use App\Http\Controllers\Provider\ProviderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $services = Service::where('status', 'Active')->with('provider')->take(6)->get();
    return view('home/index', compact('services'));
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
        
        Route::get('/user/dashboard', [ProviderController::class, 'UserDashboard'])->name('user.dashboard');


        //logout
        Route::get('/logout', [AuthController::class, 'logOut'])->name('logout');

});