<?php

namespace App\Http\Controllers\Bank\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankAccountController extends Controller
{
    //
    function login(Request $request){
        $bankAccount= $request->get("stk");
        $password=$request->get("password");
        if (Auth::guard("bank_account")->attempt(["stk"=>$bankAccount,"password"=>$password])){
            echo "pass";
        }else{
            echo"not pass";
        }
    }
}
