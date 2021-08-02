<?php

use Illuminate\Support\Facades\Route;

Route::middleware("auth:admin")->group(function (){
    Route::get('/', function () {
        return view('home');
    });
});
