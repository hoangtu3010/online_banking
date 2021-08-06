<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerInfoController;

Route::middleware("auth:user")->group(function (){

    Route::get('/',[HomeController::class,'homeCustomer']);

    Route::get('/profile', function () {
        return view('dashboard');
    });

    Route::get('/customer',[CustomerInfoController::class,'CustomerInfo']);
    Route::get('/customer/edit/{id}',[CustomerInfoController::class,'edit']);
    Route::post('/customer/save/{id}',[CustomerInfoController::class,'save']);});
    Route::post('/customer/create',[CustomerInfoController::class,'create']);






    Route::get('vdvvfvf',function (){
       return view('cdcdcd');
    });
