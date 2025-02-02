<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Mail\MailNotify;
use App\Models\BankAccount;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BankController extends Controller
{
    public function cardChoose(Request $request, $id)
    {
//        dd($request->toArray());
        $choose = $request->get("accChoose");
//        $level = "accLevel" . $choose;

        $extra = BankAccount::where("user_id", "=", $id)->get();
        foreach ($extra as $item) {
            $item->update([
                "level" => "Extra"
            ]);
        }

        $findId = BankAccount::findOrFail($choose);
//        dd($findId);

        $findId->update([
            "level" => "Main"
        ]);


//        dd($findId->toArray());

        return redirect()->back();
    }

    public function bankAccount()
    {

        $data = User::with("BankAccount")->get();
//        dd($data);
        $bank = BankAccount::all();

        return view("User.BankAccount.BankAccount", [
            "data" => $data,
            "bank" => $bank
        ]);
    }

    public function bankTransfer($id)
    {
        $find = BankAccount::with("User")->findOrFail($id);
        return view("BankAccount.transfer.transfer", [
            "data" => $find,
        ]);
    }

    public function nextStep(Request $request, $id)
    {
        $find = BankAccount::with("User")->findOrFail($id);
        $request->validate([
            "getter" => "required|size:10",
        ], [
            "getter.required" => "Vui lòng nhập số tài khoản!",
            "getter.size:10" => "Số tài khoản có 10 chữ số!",
        ]);
        //dd($request->toArray());
        $getter = BankAccount::with("User")->where("stk", "=", $request->get("getter"))->first();

        return view("BankAccount.transfer.transfer-step2", [
            "data" => $find,
            "getter" => $getter
        ]);
    }

    public function treatment(Request $request)
    {

        $find = BankAccount::with("User")->findOrFail($request->id_setter);
        $fee = $request->fee;
        if (Auth::user()->id == $request->user_id_getter) {
            $money = $request->money;
        } else {
            if ($fee==0){
                if ($request->money * 0.05 > 5000) {
                    $money = $request->money + 5000;
                } else {
                    $money = $request->money * 1.05;
                }
            }else{
                $money = $request->money;
            }

        }
        if ($money > $find->balance){
            Alert::error('Oops...', 'There is not enough money in your account to make this transaction!');
            return back();
        }

        if ($request->toArray() != []) {
            if (session()->has("bank")) {
                session()->forget("bank");
                $data = session()->get("bank");
                $data[] = $request->all();
                Session::put("bank", $data);
            } else {
                $data = session()->get("bank");
                $data[] = $request->all();
                Session::put("bank", $data);
            }
        }
        return redirect()->to("user/bankAccount/check");
    }

    public function bankChecker()
    {
        if (Session::has("bank")) {
            $bank = Session::get("bank");
            $id_setter = $bank[0]["id_setter"];
            $who = $bank[0]["fee"];
            $user_getter_id = $bank[0]["user_id_getter"];
            $getter = $bank[0]["getter"];
            $message = $bank[0]["message"];
            $setter = BankAccount::findOrFail($id_setter);
            $getter = BankAccount::all()->where("stk", "=", $getter)->first();
            $money = $bank[0]["money"];
        } else {
            return redirect()->back();
        }
        return view("BankAccount.transfer.check", [
            "who"=> $who,
            "money" => $money,
            "message" => $message,
            "data" => $setter,
            "getter" => $getter,
            "user_getter_id" => $user_getter_id
        ]);
    }

    public function bankLogin()
    {
        $name = Auth::user()->name;
        $OTP = random_int(100000, 999999);
        $find = User::findOrFail(Auth::user()->id);
        /*      dd($find->toArray());*/
        $find->update([
            "two_factor_code" => $OTP,
            "two_factor_expires_at" => now()->addMinutes(5)
        ]);
        Mail::to(Auth::user()->email)->send(new MailNotify($name, $OTP));
        Alert::success("Successfully", "Please check OTP your mail!");

        return redirect()->to("user/bankAccount/OTP");

    }

    public function resetOTP(){
        $name = Auth::user()->name;
        $OTP = random_int(100000, 999999);
        $find = User::findOrFail(Auth::user()->id);
        /*      dd($find->toArray());*/
        $find->update([
            "two_factor_code" => $OTP,
            "two_factor_expires_at" => now()->addMinutes(5)
        ]);
        Mail::to(Auth::user()->email)->send(new MailNotify($name, $OTP));
        Alert::success("Successfully", "Please check OTP your mail!");
        return back();
    }

    public function checkOTP()
    {
//        dd($bank=session()->get("bank"));
        $bank = session()->get("bank");
        $id_setter = $bank[0]["id_setter"];
        return view("BankAccount.transfer.login", [
            "id" => $id_setter
        ]);
    }

    public function OTP(Request $request)
    {
        $OTP = $request->get("OTP");
        $id = $request->get("id");
        $find = BankAccount::findOrFail($id);
        if (Auth::user()->two_factor_code == $OTP && Auth::user()->two_factor_expires_at > now()) {
            if ($find->status != "Active") {
                Alert::error('Oops...', 'Card has been frozen!');
                return back();
            }
            return redirect()->route("Accept", ["id" => $id]);
        }
        if (Auth::user()->two_factor_code == $OTP && Auth::user()->two_factor_expires_at < now()) {
            //login admin
            Alert::error('Oops...', 'Security code has expired!');
            return back();
        }
        Alert::error('Oops...', 'Bad security code!');
        return back();
    }


    public function bankAccept($id)
    {
        if (Session::has("bank")) {
            $bank = Session::get("bank");
            $id_setter = $bank[0]["id_setter"];
            $who = $bank[0]["fee"];

            if ($id != $id_setter) {
                abort(404);
            }
            $money = $bank[0]["money"];
            $user_getter_id = $bank[0]["user_id_getter"];
            if (Auth::user()->id == $user_getter_id) {
                $fee = 0;
            } else {
                if ($money * 0.05 >= 5000) {
                    $fee =  5000;
                } else {
                    $fee = $money * 0.05;
                }
            }
            $message = $bank[0]["message"];

            $get = $bank[0]["getter"];
            $setter = BankAccount::findOrFail($id_setter);
            $balance = $setter->balance;
            if ($balance < $money) $title = "That bai";
            else {
                $getter = BankAccount::all()->where("stk", "=", $get)->first();
//                $base_money=$getter->balance;
                if ($who==0){
                    $setter->update([
                        "balance" => $balance - $money-$fee
                    ]);
                    $getter->update([
                        "balance" => $getter->balance + $money
                    ]);
                }else{
                    $setter->update([
                        "balance" => $balance - $money
                    ]);
                    $getter->update([
                        "balance" => $getter->balance + $money -$fee
                    ]);
                }
                if ($who==0){
                    $who=$setter->stk;
                }else{
                    $who=$getter->stk;
                }
                //luu transaction
                Transaction::create([
                    "content" => $message,
                    "money" => $money,
                    "sender" => $setter->stk,
                    "getter" => $getter->stk,
                    "bank_account_id" => $setter->id,
                    "fee"=>$fee  ,
                    "who"=> $who  ,
                    "created_at" => Carbon::now('Asia/Ho_Chi_Minh'),
                    "updated_at" => Carbon::now('Asia/Ho_Chi_Minh')
                ]);
                Transaction::create([
                    "content" => $message,
                    "money" => $money,
                    "sender" => $setter->stk,
                    "getter" => $getter->stk,
                    "fee"=>$fee  ,
                    "who"=> $who  ,
                    "bank_account_id" => $getter->id,
                    "created_at" => Carbon::now('Asia/Ho_Chi_Minh'),
                    "updated_at" => Carbon::now('Asia/Ho_Chi_Minh')
                ]);
            }
        } else {
            Alert::error("Oops..", "An unknown error!!!");
            return redirect()->to("user/bankAccount");
        }

        return redirect()->route('success');
    }

    public function success(){
        if (Session::has("bank")) {
            $bank = Session::get("bank");
            $id_setter = $bank[0]["id_setter"];
            $who = $bank[0]["fee"];
            $user_getter_id = $bank[0]["user_id_getter"];
            $getter = $bank[0]["getter"];
            $message = $bank[0]["message"];
            $setter = BankAccount::findOrFail($id_setter);
            $getter = BankAccount::all()->where("stk", "=", $getter)->first();
            $money = $bank[0]["money"];
            Session::forget("bank");
        } else {
            return redirect()->back();
        }

        Alert::success("Success", "Money transfer successful");

        return view("BankAccount.transfer.success", [
            "who"=> $who,
            "money" => $money,
            "message" => $message,
            "data" => $setter,
            "getter" => $getter,
            "user_getter_id" => $user_getter_id,
            "created_at" => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
    }

    public function bankHistory($id)
    {
//        dd(Auth::user());
        $all_acc = BankAccount::with("User")->get();
        $stk = BankAccount::findOrFail($id);
        $sender = Transaction::all()->where("bank_account_id", "=", $id)->where("sender", "=", $stk->stk)->sortByDesc("created_at");
        $getter = Transaction::all()->where("getter", "=", $stk->stk)->where("bank_account_id", "=", $id)->sortByDesc("created_at");
//        dd($all_acc->toArray(),$sender->toArray(),$getter->toArray());
        return view("BankAccount.history.history", [
            "getter" => $getter,
            "sender" => $sender,
            "all_acc" => $all_acc
        ]);
    }

    public function bankLink()
    {
        return view("User.BankAccount.link");
    }

    public function bankLinkInfo()
    {
        return view("User.BankAccount.check");
    }

    public function bankLinkAccept()
    {
        $bank_Acc_id = Session::get("bankLink")->id;
        $id = Auth::user()->id;
//        dd($bank_Acc_id,$id);
        $bank_Acc = BankAccount::findOrFail($bank_Acc_id);
        $bank_Acc->update([
            "user_id" => $id
        ]);

        Alert::success('Success', 'Account link successful!');

        return redirect()->to("user/bankAccount");
    }
}
