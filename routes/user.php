<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerInfoController;
use App\Http\Controllers\Bank\BankController;
use App\Http\Controllers\Bank\Auth\BankAccountController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\SaveMoneyController;


Route::middleware("auth:user")->group(function (){

    Route::get('/',[HomeController::class,'homeCustomer']);

    Route::get('/customer/{id}',[CustomerInfoController::class,'CustomerInfo']);
    Route::get('/customer/edit/{id}',[CustomerInfoController::class,'edit']);
    Route::post('/customer/save/{id}',[CustomerInfoController::class,'save']);
    Route::post('/customer/create/{id}',[CustomerInfoController::class,'create']);


    Route::get('/saveMoney/choose',[SaveMoneyController::class,'choose']);
    Route::post('/saveMoney/thongtin/{id}',[SaveMoneyController::class,'thongtin']);

    Route::get('/saveMoney/check',[SaveMoneyController::class,'checkSave']);
    Route::get('/saveMoney/otp',[SaveMoneyController::class,'otp']);
    Route::get('/saveMoney/checkOtp',[SaveMoneyController::class,'checkOtp']);
    Route::post('/saveMoney/action',[SaveMoneyController::class,'action']);
    Route::get('/saveMoney/end/{id}',[SaveMoneyController::class,'end'])->name('end');


    Route::get('/saveMoney/save',[SaveMoneyController::class,'save']);
    Route::get('/saveMoney/watch/{id}',[SaveMoneyController::class,'watch']);
    Route::post('/saveMoney/comebackMoney/{id}',[SaveMoneyController::class,'comebackMoney']);


   // Route::post('/saveMoney/confirm/{id}',[SaveMoneyController::class,'confirm']);

    Route::post('/card-choose/{id}',[BankController::class,'cardChoose']);
    Route::get('/bankAccount',[BankController::class,'bankAccount']);
    Route::get('/bankAccount/transfer/{id}',[BankController::class,"bankTransfer"]);
    Route::get('/bankAccount/next-step/{id}',[BankController::class,"nextStep"]);
    Route::post('/bankAccount/treatment',[BankController::class,"treatment"]);
    Route::get('/bankAccount/check',[BankController::class,"bankChecker"]);
    Route::get('/bankAccount/login',[BankController::class,"bankLogin"]);
    Route::get('/bankAccount/resetOTP',[BankController::class,"resetOTP"]);
    Route::get('/bankAccount/OTP',[BankController::class,"checkOTP"]);
    Route::post("/bankAccount/loginHidden",[BankController::class,"OTP"]);
    Route::get('/bankAccount/accept/{id}',[BankController::class,"bankAccept"])->name("Accept");
    Route::get('/bankAccount/success',[BankController::class,"success"])->name("success");

//    Route::post("/bankAccount/loginHidden",[BankAccountController::class,"login"]);
    Route::get('/bankAccount/history/{id}',[BankController::class,"bankHistory"]);
    Route::get('/bankAccount/link',[BankController::class,"bankLink"]);
    Route::post('/bankAccount/link', [BankAccountController::class, "loginLink"]);
    Route::middleware("auth:bank")->group(function () {
//        Route::get('/bankAccount/linkInfo',[BankController::class,"bankLinkInfo"]);
    });
    Route::get('/bankAccount/link/accept', [BankController::class, "bankLinkAccept"]);
});
