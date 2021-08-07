<?php

namespace App\Http\Controllers\Bank\Auth;

use App\Http\Controllers\Bank\BankController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankAccountController extends Controller
{
    //
    function login(Request $request){
//        $bankAccount=$request->only("stk","password");
        $stk = $request->get("stk");
        $pass = $request->get("password");
//        dd($bankAccount);

        if (Auth::guard("bank_account")->attempt(["stk"=>$stk,"password"=>$pass,"status"=>"Active"])){
            return  redirect()->to("admin/bankAccount/check");
        }else{
            return back();
        }
    }
}
