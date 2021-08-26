<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Mail\MailNotify;
use App\Models\BankAccount;
use App\Models\Transaction;
use App\Models\User;
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

        $data = User::with("bankAccount")->get();
//        dd($data);
        $bank = BankAccount::all();

        return view("User.BankAccount.BankAccount", [
            "data" => $data,
            "bank" => $bank
        ]);
    }

    public function bankInfo($id)
    {
        $find = BankAccount::with("user")->findOrFail($id);
        return view("BankAccount.bankAccount", [
            "data" => $find
        ]);
    }

    public function bankTransfer($id)
    {
        $find = BankAccount::with("user")->findOrFail($id);
        return view("BankAccount.transfer.transfer", [
            "data" => $find,
            "select" => BankAccount::all()
        ]);
    }

    public function nextStep(Request $request, $id)
    {
        $find = BankAccount::with("user")->findOrFail($id);
        $request->validate([
            "getter" => "required|size:10",
        ], [
            "getter.required" => "Vui lòng nhập số tài khoản!",
            "getter.size:10" => "Số tài khoản có 10 chữ số!",
        ]);
        //dd($request->toArray());
        $getter = BankAccount::with("user")->where("stk", "=", $request->get("getter"))->first();

        return view("BankAccount.transfer.transfer-step2", [
            "data" => $find,
            "getter" => $getter
        ]);
    }

    public function treatment(Request $request)
    {
        $find = BankAccount::with("user")->findOrFail($request->id_setter);
        if (Auth::user()->id == $request->user_id_getter) {
            $money = $request->money;
        } else {
            if ($request->money * 0.05 > 5000) {
                $money = $request->money + 5000;
            } else {
                $money = $request->money * 1.05;
            }
        }
        if ($money > $find->balance)
            return back()->withInput()->withErrors(["money" => ["Không đủ tiền, số tiền cần có để chuyển là " . $money . " VND"]]);

        $data = session()->get("bank");
        if ($request->toArray() != []) {
            if (session()->has("bank")) {
                $data = [];
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
            if ($id != $id_setter) {
                abort(404);
            }
            $money = $bank[0]["money"];
            $user_getter_id = $bank[0]["user_id_getter"];
            if (Auth::user()->id == $user_getter_id) {
                $money_c = $money;
            } else {
                if ($money * 0.05 >= 5000) {
                    $money_c = $money + 5000;
                } else {
                    $money_c = $money * 1.05;
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
                $setter->update([
                    "balance" => $balance - $money_c
                ]);
                $getter->update([
                    "balance" => $getter->balance + $money
                ]);


                //luu transaction
                Transaction::create([
                    "content" => $message,
                    "money" => $money,
                    "sender" => $setter->stk,
                    "getter" => $getter->stk,
                    "bank_account_id" => $setter->id,
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
                Transaction::create([
                    "content" => $message,
                    "money" => $money,
                    "sender" => $setter->stk,
                    "getter" => $getter->stk,
                    "bank_account_id" => $getter->id,
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
                Session::forget("bank");
                $title = "success";
            }
        } else {
            return redirect()->back();
        }

        Alert::success('Success', 'The money has been transferred successfully!');

        return redirect()->to("user/bankAccount");
    }

    public function bankHistory($id)
    {
//        dd(Auth::user());
        $all_acc = BankAccount::with("user")->get();
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
//        Alert::success('Success', 'Update successfully!');
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

        return redirect()->to("user/bankAccount");
    }
}
