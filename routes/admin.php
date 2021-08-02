<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::middleware("auth:admin")->group(function (){
    Route::get('/', function () {
        return view('Admin.components.admin-home');
    });
    Route::get('/create',[AdminController::class,"AdminCreate"]);
    Route::get('/mod',[AdminController::class,"AdminMod"]);
    Route::get('/setting/{id}',[AdminController::class,"AdminSetting"]);
    Route::get('/customer',[AdminController::class,"AdminCustomer"]);
    Route::get('/createbank',[AdminController::class,"createBank"]);
    Route::get('/active/{id}',[AdminController::class,"Active"]);
    Route::get('/bankAccount',[AdminController::class,"bankAccount"]);
    Route::get('/bankAccount/edit/{id}',[AdminController::class,"editBankAccount"]);
});
