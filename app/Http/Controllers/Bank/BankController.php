<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    //

    public function bankAccount(){
        $data = User::with("bankAccount")->get();
//        dd($data);
        $bank = BankAccount::all();
        return view("User.BankAccount.BankAccount",[
            "data"=>$data,
            "bank"=>$bank
        ]);
    }
    public function bankInfo($id){
        $find=BankAccount::with("user")->findOrFail($id);
        return view("BankAccount.bankAccount",[
            "data"=>$find
        ]);
    }
    public function bankTransfer($id){
        $find=BankAccount::with("user")->findOrFail($id);
        return view("BankAccount.transfer.transfer",[
            "data"=>$find,
            "select"=>BankAccount::all()
        ]);
    }
    public function bankLogin(Request $request,$id){
        $data=session()->get("bank");
        if ($request->toArray()!=[]){
            if (session()->has("bank")){
                $data=[];
                session()->forget("bank");
                $data=session()->get("bank");
                $data[]=$request->all();
                Session::put("bank",$data);
            }
            else{
                $data=session()->get("bank");
                $data[]=$request->all();
                Session::put("bank",$data);

            }
        }
//        dd(Session::get("bank"));
        $find=BankAccount::with("user")->findOrFail($id);
        return view("BankAccount.transfer.login",[
            "data"=>$find,
            "select"=>BankAccount::all()
        ]);
    }
    public function bankChecker(){
        if (Session::has("bank")) {
            $bank=Session::get("bank");
//            dd($bank);
            $id_setter=$bank[0]["id_setter"];
            $getter=$bank[0]["getter"] ;
            $message=$bank[0]["message"] ;
            $setter= BankAccount::findOrFail($id_setter);
            $getter = BankAccount::all()->where("stk","=",$getter)->first();
            $money=$bank[0]["money"];
        }else{
            return redirect()->back();
        }
        return view("BankAccount.transfer.check",[
            "money"=>$money,
            "message"=>$message,
            "data"=>$setter,
            "getter"=>$getter
        ]);
    }
    public function bankAccept($id){
        if (Session::has("bank")) {
            $bank=Session::get("bank");
            $id_setter=$bank[0]["id_setter"];
            if ($id!=$id_setter){
                echo "error";
            }
            $money=$bank[0]["money"];
            $message=$bank[0]["message"];

            $get=$bank[0]["getter"] ;
            $setter= BankAccount::findOrFail($id_setter);
            $balance=$setter->balance;
            if ($balance<$money) $title= "That bai";
            else{
                $getter = BankAccount::all()->where("stk","=",$get)->first();
//                $base_money=$getter->balance;
                $setter->update([
                    "balance"=>$balance-$money
                ]);
                $getter->update([
                    "balance"=>$getter->balance+$money
                ]);


                //luu transaction
                Transaction::create([
                    "content"=>$message,
                    "money"=>$money,
                    "sender"=>$setter->stk,
                    "getter"=>$getter->stk,
                    "bank_account_id"=>$setter->id,
                    "created_at"=>now(),
                    "updated_at"=>now()
                ]);
                Transaction::create([
                    "content"=>$message,
                    "money"=>$money,
                    "sender"=>$setter->stk,
                    "getter"=>$getter->stk,
                    "bank_account_id"=>$getter->id,
                    "created_at"=>now(),
                    "updated_at"=>now()
                ]);
                Session::forget("bank");
                $title= "success";
            }
        }else{
            return redirect()->back();
        }
        return view("BankAccount.transfer.Success",[
            "Title"=>$title
        ]);
    }
    public function bankHistory($id){
        $all_acc= BankAccount::with("user")->get();
        $stk = BankAccount::findOrFail($id);
        $sender = Transaction::all()->where("bank_account_id","=",$id)->where("sender","=",$stk->stk)->sortByDesc("created_at");
        $getter = Transaction::all()->where("getter","=",$stk->stk)->where("bank_account_id","=",$id)->sortByDesc("created_at");
//        dd($all_acc->toArray(),$sender->toArray(),$getter->toArray());
        return view("BankAccount.history.history",[
            "getter"=> $getter,
            "sender"=>$sender,
            "all_acc"=>$all_acc
        ]);
    }
    public function bankLink(){
        return view("User.BankAccount.link");
    }
    public function bankLinkInfo(){
        return  view("User.BankAccount.check");
    }public function bankLinkAccept(){
        $bank_Acc_id=Session::get("bankLink")->id;
        $id = Auth::user()->id;
//        dd($bank_Acc_id,$id);
        $bank_Acc= BankAccount::findOrFail($bank_Acc_id);
        $bank_Acc->update([
            "user_id"=>$id
        ]);
        return  view("User.BankAccount.success");
    }
}
