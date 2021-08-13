<?php

namespace App\Http\Controllers\Bank\Auth;

use App\Http\Controllers\Bank\BankController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankAccountController extends Controller
{
    //
    function loginLink(Request $request){
        $stk = $request->get("stk");
        $pass = $request->get("password");
//        dd($bankAccount);

        if (Auth::guard("bank")->attempt(["stk"=>$stk,"password"=>$pass,"user_id"=>null])){
            return  redirect()->to("user/bankAccount/linkInfo");
        }else if (Auth::guard("bank")->attempt(["stk"=>$stk,"password"=>$pass])){
            return back()->withErrors(["Bank account đã được liên kết","MSG"]);
        }else{
            return back()->withErrors(["Sai mật khẩu hoặc tài khoản","MSG"]);
        }
    }
}
