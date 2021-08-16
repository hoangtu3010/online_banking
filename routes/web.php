<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ResetPassWordController;

Route::get("quen-mat-khau",[ResetPassWordController::class,"quen_mat_khau"]);
Route::post("sendToEmail",[ResetPassWordController::class,"sendToEmail"]);
Route::get("/pass/reset",[ResetPassWordController::class,"resetPass"])->name('resetPass');
Route::post("/pass/reset",[ResetPassWordController::class,"savePass"]);



Route::match(["get", "post"], "login", [LoginController::class, "login"])->name("login");
Route::match(["get", "post"], "register", [RegisterController::class, "register"])->name("register");

Route::get('/', [WelcomeController::class, "welcome"]);
Route::post('/send-feedback', [WelcomeController::class, "sendFeedback"]);
Route::get('/detail', [WelcomeController::class, "getDetail"]);
Route::get('/blog/news/detail/{id}', [WelcomeController::class, "newsDetail"]);
Route::get('/blog', [WelcomeController::class, "blog"]);
Route::get('/about-us', [WelcomeController::class, "aboutUs"]);
Route::get('/contact-us', [WelcomeController::class, "contactUs"]);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
