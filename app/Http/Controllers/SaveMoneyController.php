<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaveMoneyController extends Controller
{
    public function list(){
        return view('User.SaveMoney.list');
    }
    public function selectBank(){

        $all_bank = BankAccount::all();
        return view('User.SaveMoney.listBank',[
            'listBank'=>$all_bank
        ]);
    }
    public function choose($id){
        $bank = BankAccount::findOrFail($id);
        return view('User.SaveMoney.choose',[
            'bank'=>$bank
        ]);
    }
    public function info(Request $request,$id){
        $bank =BankAccount::findOrFail($id);



    }



    /*public function confirm(Request $request){
        $money = $request->money;
        $choose = $request->choose;
        return view('x');
    }*/
}
