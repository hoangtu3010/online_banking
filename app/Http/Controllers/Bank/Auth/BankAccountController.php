<?php

namespace App\Http\Controllers\Bank\Auth;

use App\Http\Controllers\Bank\BankController;
use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class BankAccountController extends Controller
{
    //
    function loginLink(Request $request){
        $stk = $request->get("stk");
        $pass = $request->get("password");
//        dd($bankAccount);

        if (Auth::guard("bank")->attempt(["stk"=>$stk,"password"=>$pass,"user_id"=>null])){
            $backAccount = BankAccount::where('stk', '=', $stk)->first();
            Session::put("bankLink", $backAccount);
            return  redirect()->to("user/bankAccount/link/accept");
        }else if (Auth::guard("bank")->attempt(["stk"=>$stk,"password"=>$pass])){
            return back()->withErrors(["Bank account has been linked","MSG"]);
        }else{
            Alert::error("ERROR", "Password or account Wrong!");
            return back();
        }

    }
}
