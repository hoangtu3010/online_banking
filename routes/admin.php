<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Bank\Auth\BankAccountController;

Route::middleware("auth:admin")->group(function (){
    Route::get('/', function () {
        return view('Admin.components.admin-home');
    });
    Route::get('/create',[AdminController::class,"AdminCreate"]);
    Route::post('/create',[AdminController::class,"saveCrateAdmin"]);
    Route::get('/mod',[AdminController::class,"AdminMod"]);
    Route::get('/newPass/{id}',[AdminController::class,"getPassAdmin"]);
    Route::post('/savePass/{id}',[AdminController::class,"saveNewPass"]);
    Route::get('/delete/{id}',[AdminController::class,"deleteAdmin"]);
    Route::get('/role',[AdminController::class,"roles"]);
    Route::get('/role/add',[AdminController::class,"addRole"]);
    Route::post('/role/save',[AdminController::class,"saveRole"]);
    Route::get('/role/edit/{id}',[AdminController::class,"editRole"]);
    Route::post('/role/update/{id}',[AdminController::class,"updateRole"]);
    Route::get('/role/delete/{id}',[AdminController::class,"deleteRole"]);
    Route::get('/setting/{id}',[AdminController::class,"AdminSetting"]);
    Route::post('/setting/save/{id}',[AdminController::class,"saveSetting"]);


    Route::get('/customer',[AdminController::class,"AdminCustomer"]);
    Route::get('/customer/edit/{id}',[AdminController::class,"editAdminCustomer"]);
    Route::post('/customer/update/{id}',[AdminController::class,"updateCus"]);
    Route::get('/customer/getPassword/{id}',[AdminController::class,"getPassUser"]);
    Route::get('/customer/delete/{id}',[AdminController::class,"deleteUser"]);





    Route::get('/createbank',[AdminController::class,"createBank"]);
    Route::get('/active/{id}',[AdminController::class,"Active"]);
    Route::get('/bankAccount',[AdminController::class,"bankAccount"]);
    Route::get('/bankAccount/edit/{id}',[AdminController::class,"editBankAccount"]);
    Route::post('/bankAccount/update/{id}',[AdminController::class,"saveBankAcc"]);
    Route::get('/bankAccount/getPassword/{id}',[AdminController::class,"getPassBank"]);


//    Route::get('/test', function () {
//        return view('BankAccount.test');
//    });
//    Route::post("/test/login",[BankAccountController::class,"login"]);
});
