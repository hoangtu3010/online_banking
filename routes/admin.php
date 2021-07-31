<?php

use Illuminate\Support\Facades\Route;

Route::middleware("auth:admin")->group(function (){
    Route::get('/', function () {
        echo "admin";
        return view('dashboard');
    });
});
