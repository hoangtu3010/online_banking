<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(["get", "post"], "login", [LoginController::class, "login"])->name("login");
Route::match(["get", "post"], "register", [RegisterController::class, "register"])->name("register");
Route::get('/', [WelcomeController::class, "welcome"]);
Route::get('/blog/news/detail/{id}', [WelcomeController::class, "newsDetail"]);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
