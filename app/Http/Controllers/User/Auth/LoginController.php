<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginController extends Controller
{
    public function login(Request $request){
        if ($request->method() == "GET"){
            return view("login & register.login");
        }

        $credentials = $request->only(["email", "password"]);
        if (Auth::guard("user")->attempt($credentials)){
            return redirect()->to("user");
        }
        if (Auth::guard("admin")->attempt($credentials)){
            return redirect()->to("admin");
        }

        return redirect()->back()->withInput();
    }
}
