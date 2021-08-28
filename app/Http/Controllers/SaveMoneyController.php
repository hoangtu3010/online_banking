<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\BankAccount;
use App\Models\SaveMoney;
use App\Models\SavingsPackage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class SaveMoneyController extends Controller
{
    public function show()
    {
        return view('User.SaveMoney.list');
    }

    public function selectBank()
    {
        $all_bank = BankAccount::all();
        return view('User.SaveMoney.listBank', [
            'listBank' => $all_bank
        ]);
    }

    public function choose($id)
    {
        $bank = BankAccount::findOrFail($id);
        $package = SavingsPackage::all();
        return view('User.SaveMoney.choose', [
            'bank' => $bank,
            'package' => $package
        ]);
    }
//    public function thongtin1(Request $request, $id){
//        $id = $request->id;
//
//        $stk = $request->stk;
//        $balance = $request->balance;
//        $money = $request->money;
//        $time = $request->time;
//        $desire = $request->desire;
//        if (1<=$time&&$time<=3){
//            $interest = 0.03;
//        }
//        if (3<$time && $time<=6){
//            $interest = 0.06;
//        }
//        if (6<$time && $time<=12){
//            $interest = 0.12;
//        }
//        if (12<$time && $time<=24){
//            $interest = 0.16;
//        }
//        return view('User.SaveMoney.thongtin1',[
//            'stk'=>$stk,
//            'balance'=>$balance,
//            'money'=>$money,
//            'time'=>$time,
//            'interest'=>$interest,
//            'desire'=>$desire,
//            'id'=>$id
//        ]);
//
//    }
    public function thongtin(Request $request, $id)
    {
        $bank = BankAccount::findOrFail($id);
        $package = SavingsPackage::findOrFail($request->name_package);
        $money = $request->money;
        if ($bank->balance < $money) {
            Alert::error("Oops..", "Not enough money!");
            return back();
        }
        $data = session()->get("saveMoney");
        if ($request->toArray() != []) {
            if (session()->has("saveMoney")) {
                $data = [];
                session()->forget("saveMoney");
                $data = session()->get("saveMoney");
                $data[] = $request->all();
                //dd($request->all());
                Session::put("saveMoney", $data);

            } else {
                $data = session()->get("saveMoney");
                $data[] = $request->all();
                Session::put("saveMoney", $data);
            }
        }
        return redirect()->to('user/saveMoney/check');
    }

    public function checkSave()
    {
        if (Session::has('saveMoney')) {
            $cat = Session::get('saveMoney');
            $tkg = $cat[0]['stk'];
            $money = $cat[0]['money'];
            $name_package = $cat[0]["name_package"];
            $package = SavingsPackage::findOrFail($name_package);
            $desire = $cat[0]['desire'];
        } else {
            return redirect()->back();
        }
        return view('User.SaveMoney.showComfirm', [
            'tkg' => $tkg,
            'money' => $money,
            'name_package' => $package->name_package,
            'time_package' => $package->time_package,
            'interest' => $package->interest,
            'desire' => $desire,
        ]);
    }

    public function otp()
    {
        $name = Auth::user()->name;
        $OTP = random_int('111111', '999999');
        $find = User::findOrFail(Auth::user()->id);
        $find->update([
            "two_factor_code" => $OTP,
        ]);
        Mail::to(Auth::user()->email)->send(new MailNotify($name, $OTP));
        return redirect()->to('user/saveMoney/checkOtp');
    }

    public function checkOtp()
    {
        $bank = \session()->get('saveMoney');
//        dd($bank);
        $stk = $bank[0]['stk'];
        $stk = BankAccount::where("stk", "=", $stk)->first();
        return view('User.SaveMoney.checkOtp', [
            'id' => $stk->id
        ]);
    }

    public function action(Request $request)
    {
        $OTP = $request->otp;
        $id = $request->get('id');

        if (Auth::user()->two_factor_code == $OTP) {
            return redirect()->route('end', ['id' => $id]);
        }
        return back();
    }

    public function end($id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $cat = BankAccount::findOrFail($id);

        //dd($cat->toArray());
        if (Session::has('saveMoney')) {
            $saveMoney = Session::get('saveMoney');
//dd($saveMoney);
            $dola = $saveMoney[0]['money'];
            //dd($dola);
            $stk = $saveMoney[0]['stk'];
            $stk = BankAccount::where("stk", "=", $stk)->first();
            //dd($id_x);
            $name_package = $saveMoney[0]['name_package'];
            $package = SavingsPackage::findOrFail($name_package);
            $time = $package->time_package;
            $interest = $saveMoney[0]['interest'];
            //  dd($interest);

            if ($stk->id == $id) {
                $cat->update([
                    $cat->balance = $cat->balance - $dola
                ]);
                SaveMoney::create([
                    'stk' => $saveMoney[0]['stk'],
                    'money' => $saveMoney[0]['money'],
                    'bankAcc_id' => $stk->id,
                    'package_id' => $name_package,
                    'permission' => $saveMoney[0]['desire'],
                ]);
            };
        }
        return view('User.SaveMoney.Success');
    }


    public function save()
    {
        $save = SaveMoney::with("package")->get();
//        dd($save);
        return view('User.SaveMoney.Save.save', [
            'save' => $save
        ]);
    }

    public function watch($id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $cat = SaveMoney::with("Package")->findOrFail($id);
        $timeSave = $cat['created_at']; //thời gian khi gửi tiền
//          dd($cat->toArray());

        $interest = $cat->Package->interest;
        $money = $cat->money;//tiền đã gửi vào trong ngân hàng
        $package = $cat->Package->time_package;//gói thời gian gửi
        $create_up = strtotime($timeSave);//tổng số giây thời gian gửi tiền từ năm 1970
        $now = time();//số giây đến thời điểm hiện tại từ năm 1970


        $hd = $create_up + $package * 60 * 60;
        $x = $now - $hd;
        $min = $create_up + ($package / 2) * 60 * 60;


        $h = ($now - $create_up) / 3600;//số giờ từ lúc gửi đến hiện tại
        $after = $money;// tiền cộng dồn sau lãi
        $afterhd = $money;//tiền cộng dồn sau lãi có hợp dồng
        $aftercc = $money;
        $lai = 0;
        $laihd = 0;
        $laicc = 0;


        if ($now > $min) {
            $lai = $after * 0.01;
        } else {
            $lai = 0;
        }

        if ($now >= $package) {
            $laihd = $afterhd * $interest;
        }

        if ($now > $hd) {
            for ($i = $package; $i < $h; $i += $package) {
                $laicc += $aftercc * $interest;
                $aftercc = $money + $laicc;
            }
        }

        if ($now < $min) {
            $laicc = 0;
        }

        if ($now > $min && $now < $hd) {
            $laicc = $aftercc * 0.01;
        }

        return view('User.SaveMoney.Save.detail', [
            'cat' => $cat,
            'h' => $h,
            'lai' => $lai,
            'laihd' => $laihd,
            'laicc' => $laicc,
            "now" => $now,
        ]);
    }

    public function comebackMoney(Request $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = $request->all();

        $cat = SaveMoney::findOrFail($id);

        $bankAcc_id = $cat['bankAcc_id'];
        $bankAcc = BankAccount::findOrfail($bankAcc_id);
        $balance = $bankAcc['balance'];
        $permiss = $cat['permission'];
        if ($permiss === 'Half') {
            $lai = $request->__get('lai');
            $von = $request->__get('von');

            $bankAcc->update([
                'balance' => $balance + $lai + $von
            ]);
            $cat->delete();
        }else if ($permiss === "Full") {
            if ($request->get("time") > $request->get("time_package")){
                $lai = $request->__get('lai');
                $von = $request->__get('von');
                $bankAcc->update([
                    'balance' => $balance + $lai + $von
                ]);
                $cat->delete();
            }else{
                Alert::warning("Fail!!!", "Withdrawal failed...");
                return back();
            }
        }
        else {
            return view('User.SaveMoney.dontSuss');
        }

        return view('User.SaveMoney.Save.comeback');

    }
}

