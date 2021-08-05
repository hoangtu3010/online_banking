<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::middleware("auth:user")->group(function (){

    Route::get('/',[HomeController::class,'homeCustomer']);

    Route::get('/profile', function () {
        return view('dashboard');
    });

});
