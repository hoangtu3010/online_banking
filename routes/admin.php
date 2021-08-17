<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Bank\Auth\BankAccountController;
use App\Http\Controllers\Bank\BankController;
use App\Http\Controllers\BlogController;

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
    Route::post('/active/{id}',[AdminController::class,"Active"]);
    Route::get('/bankAccount',[AdminController::class,"bankAccount"]);
    Route::get('/bankAccount/edit/{id}',[AdminController::class,"editBankAccount"]);
    Route::get('/bankAccount/nap/{id}',[AdminController::class,"napBankAccount"]);
    Route::post('/bankAccount/complete/{id}',[AdminController::class,"complete"]);
    Route::post('/bankAccount/update/{id}',[AdminController::class,"saveBankAcc"]);
    Route::get('/bankAccount/getPassword/{id}',[AdminController::class,"getPassBank"]);


    Route::get('/blog/comments',[BlogController::class,"getComments"]);
    Route::get('/blog/comments/delete/{id}',[BlogController::class,"deleteComments"]);

    Route::get('/blog/news',[BlogController::class,"getNews"]);
    Route::get('/blog/news/add-news',[BlogController::class,"addNews"]);
    Route::post('/blog/news/save',[BlogController::class,"saveNews"]);
    Route::get('/blog/news/edit/{id}',[BlogController::class,"editNews"]);
    Route::post('/blog/news/update/{id}',[BlogController::class,"updateNews"]);
    Route::get('/blog/news/delete/{id}',[BlogController::class,"deleteNews"]);


    Route::get('/bankAccount/info/{id}',[BankController::class,"bankInfo"]);
    Route::get('/bankAccount/transfer/{id}',[BankController::class,"bankTransfer"]);
    Route::post('/bankAccount/login/{id}',[BankController::class,"bankLogin"]);
    Route::get('/bankAccount/login/{id}',[BankController::class,"bankLogin"]);
    Route::get('/bankAccount/check',[BankController::class,"bankChecker"]);
    Route::get('/bankAccount/accept/{id}',[BankController::class,"bankAccept"]);




//    Route::get('/test', function () {
//        return view('BankAccount.test');
//    });
});
