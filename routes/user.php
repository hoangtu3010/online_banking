<?php
use Illuminate\Support\Facades\Route;


Route::middleware("auth:user")->group(function (){
    Route::get('/', function () {
        echo "user";
        return view('dashboard');
    });
});
