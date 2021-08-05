<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request){

        if ($request->method() == "GET"){
            return view("login & register.login");
        }

        $query = [
            'email' => $request->get("email"),
            'password' => $request->get("password"),
        ];

        $is_autheticated = false;
        if (Auth::guard('user')->attempt($query)){
            $is_autheticated = true;
            Auth::shouldUse('user');
        }

        if ($is_autheticated){
            $request->session()->regenerate();
            return redirect()->to("user");
        }

        $credentials = $request->only(["email", "password"]);
        if (Auth::guard("admin")->attempt($credentials)){
            return redirect()->to("admin");
        }

        return redirect()->back()->withInput();
    }
}
