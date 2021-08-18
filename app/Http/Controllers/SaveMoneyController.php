<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\MailNotify;
use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\SaveMoney;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SaveMoneyController extends Controller
{
    public function show(){
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
    public function thongtin(Request $request,$id){
        $bank =BankAccount::findOrFail($id);
        $money = $request->money;
        if ($bank->balance<$money){
            return  back()->withErrors(["money"=>["Không đủ tiền"]]);
        }
        $data=session()->get("saveMoney");
        if ($request->toArray()!=[]){
            if (session()->has("saveMoney")){
                $data=[];
                session()->forget("saveMoney");
                $data=session()->get("saveMoney");
                $data[]=$request->all();
                Session::put("saveMoney",$data);
            }
            else{
                $data=session()->get("saveMoney");
                $data[]=$request->all();
                Session::put("saveMoney",$data);
            }
        }
        return redirect()->to('user/saveMoney/check');
    }
    public function checkSave(){
        if (Session::has('saveMoney')){
            $cat = Session::get('saveMoney');
            $tkg =$cat[0]['stk'];
            $money=$cat[0]['money'];
            $time =$cat[0]['time'];
        }
        else{
            return redirect()->back();
        }
        return view('User.SaveMoney.showComfirm',[
            'tkg'=>$tkg,
            'money'=>$money,
            'time'=>$time
        ]);
    }
    public function otp(){
        $name = Auth::user()->name;
        $OTP = random_int('111111','999999');
        $find= User::findOrFail(Auth::user()->id);
        $find->update([
            "two_factor_code"=>$OTP,
        ]);
        Mail::to(Auth::user()->email)->send(new MailNotify($name,$OTP));
        return redirect()->to('user/saveMoney/checkOtp');
    }
    public function checkOtp(){
        $bank=\session()->get('saveMoney');
        $id= $bank[0]['id'];

         return view('User.SaveMoney.checkOtp',[
             'id'=>$id
         ]);
    }
    public function action(Request $request){
        $OTP = $request->otp;
        $id = $request->get('id');

        if (Auth::user()->two_factor_code==$OTP){
            return redirect()->route('end',['id'=>$id]);
        }
        return back();
    }
    public function end($id){
        $cat = BankAccount::findOrFail($id);
        //dd($cat->toArray());
       if (Session::has('saveMoney')){
           $saveMoney = Session::get('saveMoney');
           //dd($saveMoney);
           $dola= $saveMoney[0]['money'];
           //dd($dola);
           $id_x=$saveMoney[0]['id'];
           //dd($id_x);
           if ($id_x==$id){
               $cat->update([
                   $cat->balance=$cat->balance-$dola
               ]);
               SaveMoney::create([
                   'stk'=>$saveMoney[0]['stk'],
                   'money'=>$saveMoney[0]['money'],
               'timeSave'=>$saveMoney[0]['time'],
           'bankAcc_id'=>$saveMoney[0]['id'],
               ]);
           };
       }
       return view('User.SaveMoney.Success');
    }



















    /*public function confirm(Request $request,$id){
        $name=$request->name;
        $money=$request->money;
        $time=$request->time;
        return view('User.SaveMoney.showComfirm',[
           'name'=>$name,
           'money'=>$money,
           'time'=>$time,
        ]);
    }*/


   /* public function add(Request $request){



        SaveMoney::create([
            'bankAcc_id'=>$id,
            'stk'=>$nameBank,
            'money'=>$money,
            'timeSave'=>$time,
            'code'=>random_int('1','9')
        ]);
        $cat->update([
           'balance'=>$cat->balance-$money
        ]);


        return 'thanh cong';

    }*/

}
