<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request){
        if ($request->method() == "GET"){
            return view("login & register.register");
        }

        User::create([
            "name"=>$request->get("name"),
            "email"=>$request->get("email"),
            "password"=>bcrypt($request->get("password")),
        ]);
        return redirect()->to("/");
    }
}
