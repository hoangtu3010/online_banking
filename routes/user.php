<?php
use Illuminate\Support\Facades\Route;


Route::middleware("auth:user")->group(function (){
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/profile', function () {
        return view('dashboard');
    });
});
