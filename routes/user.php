<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerInfoController;
use App\Http\Controllers\Bank\BankController;
use App\Http\Controllers\Bank\Auth\BankAccountController;
use App\Http\Controllers\User\Auth\LoginController;


Route::middleware("auth:user")->group(function (){

    Route::get('/',[HomeController::class,'homeCustomer']);

    Route::get('/profile', function (){
        return view("profile.show");
    });

    Route::get('/customer',[CustomerInfoController::class,'CustomerInfo']);
    Route::get('/customer/edit/{id}',[CustomerInfoController::class,'edit']);
    Route::post('/customer/save/{id}',[CustomerInfoController::class,'save']);
    Route::post('/customer/create',[CustomerInfoController::class,'create']);



    Route::get('/bankAccount',[BankController::class,'bankAccount']);
    Route::get('/bankAccount/info/{id}',[BankController::class,"bankInfo"]);
    Route::get('/bankAccount/transfer/{id}',[BankController::class,"bankTransfer"]);
    Route::post('/bankAccount/next-step/{id}',[BankController::class,"nextStep"]);
    Route::post('/bankAccount/treatment',[BankController::class,"treatment"]);
    Route::get('/bankAccount/OTP',[BankController::class,"checkOTP"]);
    Route::get('/bankAccount/login',[BankController::class,"bankLogin"]);
    Route::get('/bankAccount/check',[BankController::class,"bankChecker"]);
    Route::get('/bankAccount/accept/{id}',[BankController::class,"bankAccept"])->name("Accept");
    Route::post("/bankAccount/loginHidden",[BankController::class,"OTP"]);
//    Route::post("/bankAccount/loginHidden",[BankAccountController::class,"login"]);
    Route::get('/bankAccount/history/{id}',[BankController::class,"bankHistory"]);
    Route::get('/bankAccount/link',[BankController::class,"bankLink"]);
    Route::post('/bankAccount/link', [BankAccountController::class, "loginLink"]);
    Route::middleware("auth:bank")->group(function () {
        Route::get('/bankAccount/linkInfo',[BankController::class,"bankLinkInfo"]);
    });
    Route::get('/bankAccount/link/accept', [BankController::class, "bankLinkAccept"]);



});





