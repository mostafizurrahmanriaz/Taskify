<?php


use App\Http\Controllers\Provider\ProviderController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home/index');
})->name('home');

//authentication
Route::view('/registration', 'auth/registration')->name('signUp');
Route::post('/sign-up', [AuthController::class, 'register'])->name('registerSave');


Route::middleware('auth')->group(function(){
    //provider
    Route::middleware('provider')->group(function(){
        Route::post('/provider/setup', [ProviderController::class, 'setupProfile'])->name('save.provider');
        Route::view('/provider/setup', 'provider/register')->name('setup.provider');
        Route::view('/provider/dashboard', 'provider/register')->name('setup.provider');

        Route
    });
});