<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        if ($request->method() == "GET") {
            return view("login & register.register");
        }

        $request->validate([
            'password' => 'bail|required|min:8',
            'password_confirmation' => 'bail|required|same:password'
        ]);

        $account = User::create([
            "name" => $request->get("name"),
            "email" => $request->get("email"),
            "password" => bcrypt($request->get("password")),
        ]);

        if (Auth::guard("user")->attempt(["email" => $request->get("email"), "password" => $request->get("password")])) {
            return redirect()->to(url("user/customer", ['id'=>$account->id]));
        }

        return redirect()->withErrors("Fail!", 404);
    }
}
