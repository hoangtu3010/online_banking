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
    public function thongtin1(Request $request,$id){
        $id = $request->id;

        $stk = $request->stk;
        $balance = $request->balance;
        $money = $request->money;
        $time = $request->time;
        if ($time ==='3 giờ'){
            $interest = 0.03;
        }
        if ($time ==='6 giờ'){
            $interest = 0.06;
        }
        if ($time ==='12 giờ'){
            $interest = 0.12;
        }
        return view('User.SaveMoney.thongtin1',[
            'stk'=>$stk,
            'balance'=>$balance,
            'money'=>$money,
            'time'=>$time,
            'interest'=>$interest,
            'id'=>$id
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
                //dd($request->all());
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
            $interest= $cat[0]['interest'];
        }
        else{
            return redirect()->back();
        }
        return view('User.SaveMoney.showComfirm',[
            'tkg'=>$tkg,
            'money'=>$money,
            'time'=>$time,
            'interest'=>$interest
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
        //dd($bank);
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
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $cat = BankAccount::findOrFail($id);
        //dd($cat->toArray());
       if (Session::has('saveMoney')){
           $saveMoney = Session::get('saveMoney');


           $dola= $saveMoney[0]['money'];
           //dd($dola);
           $id_saveMoney=$saveMoney[0]['id'];
           //dd($id_x);
           $time= $saveMoney[0]['time'];
            $interest = $saveMoney[0]['interest'];
          //  dd($interest);

           if ($id_saveMoney==$id){
               $cat->update([
                   $cat->balance=$cat->balance-$dola
               ]);
               SaveMoney::create([
                   'stk'=>$saveMoney[0]['stk'],
                   'money'=>$saveMoney[0]['money'],
                   'timeSave'=>$saveMoney[0]['time'],
                   'bankAcc_id'=>$saveMoney[0]['id'],
                   'interest'=>$saveMoney[0]['interest']
               ]);
           };
       }
       return view('User.SaveMoney.Success');
    }





    public function save(){
       $save= SaveMoney::all();
       return view('User.SaveMoney.Save.save',[
           'save'=>$save
       ]);
    }
    public function watch($id){
        $cat = SaveMoney::findOrFail($id);
        $interest = $cat->interest;
        //dd($interest);
      // dd($cat->toArray());
        $money = $cat['money'];//tiền đã gửi vào trong ngân hàng
        $package = $cat['timeSave'];//gói thời gian gửi

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeSave = $cat['created_at']; //thời gian cũ
        $totalS = strtotime($timeSave);//tổng số giây thời gian cũ .
        $timestamp =time();//số giây đến thời điểm hiện tại;
        $timepass = $timestamp-$totalS;//hiệu số giây của thời gian hiện tại và thời gian lưu
       // dd($timeSave);
        //dd($timepass);

        $time3th =  date_modify($timeSave,'+3 hours');//thời gian cũ công thêm 3 tháng
        $total3th = strtotime($time3th);///sô giây từ thời gian cộng thêm 3 tháng
        $timepass3th=$total3th - $totalS;//so giây khi tăng 3 tháng - số giây lúc lưu
        $h3th = $timepass3th/(60*60);//số giờ từ lúc gủi đến thời gian 3 h
        //dd($time3th);
        //dd($timepass3th);

        $time6th=  date_modify($timeSave,'+3 hours');//thời gian cũ công thêm 6 tháng
        $total6th = strtotime($time6th);//sô giây từ thời gian cộng thêm 6 tháng
        $timepass6th=$total6th-$totalS;//so giây khi tăng 6 tháng - số giây lúc lưu
        $h6th = $timepass6th/(60*60);//số giờ từ lúc gủi đến thời gian 6 h
        //dd($time6th);
        //dd($timepass6th);
//
        $time1y=  date_modify($timeSave,'+6 hours');//thời gian cũ công thêm 1 năm
        $total1y = strtotime($time1y);//sô giây từ thời gian cộng thêm 1 năm
        $timepass1y=$total1y-$totalS;//so giây khi tăng 1 năm - số giây lúc lưu
        $h1y = $timepass1y/(60*60);//số giờ từ lúc gủi đến thời gian 1 h
        //dd($time1y);
        //dd($timepass1y);


        $h = $timepass/(60*60);//số giờ từ lúc gửi đến hiện tại

//dd($h);
        $after = $money;// tiền cộng dồn sau lãi
        $afterhd =$money;//tiền cộng dồn sau lãi có hợp dồng
        $aftercc = $money;
        $lai=0;
        $laihd=0;
        $laicc= 0;

        if (0<$timestamp ){
            //for ($i=0;$i<$h;$i++){
                $lai += $after*1/100;
                $after = $money+$lai;
            //}
        }
        ///////////////////////
        if ($package==='3 giờ'){
                    $laihd += $afterhd*$interest;
                    $afterhd = $money+$laihd;
        }
        if ($package==='3 giờ'){
            if ($timestamp>$total3th){
                for ($i=3;$i<$h;$i+=3){
                    $laicc += $aftercc*$interest;
                    $aftercc = $money+$laicc;

                }
            }
            else{
                for ($i=0;$i<$h;$i+=3){
                    $laicc += $aftercc*1/100;
                    $aftercc = $money+$laicc;
                }
            }
        }
        /////////////////////////////////////
        if ($package==='6 giờ'){
                $laihd += $afterhd*$interest;
                $afterhd = $money+$laihd;


        }
        if ($package==='6 giờ'){
            if ($timestamp>$total6th){
                for ($i=6;$i<$h;$i+=6){
                    $laicc += $aftercc*$interest;
                    $aftercc = $money+$laicc;
                }
            }else{
                for ($i=6;$i<$h;$i+=6){
                    $laicc += $aftercc*1/100;
                    $aftercc = $money+$laicc;
                }
            }
        }
        /////////////////////////////////////
        if ($package==='12 giờ'){
                $laihd += $afterhd*$interest;
                $afterhd = $money+$laihd;

        }
        if ($package==='12 giờ'){
            if ($timestamp>$total1y){
                for ($i=12;$i<$h;$i+=12){
                    $laicc += $aftercc*$interest;
                    $aftercc = $money+$laicc;
                }
            }else{
                for ($i=12;$i<$h;$i+=12){
                    $laicc += $aftercc*1/100;
                    $aftercc = $money+$laicc;
                }
            }
        }

        return view('User.SaveMoney.Save.detail',[
            'cat'=>$cat,
            'h'=>$h,
            'lai'=>$lai,
            'laihd'=>$laihd,
            'laicc'=>$laicc,
            "now"=>$timestamp,
        ]);
    }
    public function comebackMoney(Request $request,$id){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = $request->all();

        $cat = SaveMoney::findOrFail($id);
        $bankAcc_id = $cat['bankAcc_id'];
        $bankAcc = BankAccount::findOrfail($bankAcc_id);
        $balance = $bankAcc['balance'];
        //dd($bankAcc->toArray());
        $lai = $request->__get('lai');
        $von = $request->__get('von');
        $bankAcc->update([
           'balance'=>$balance+$lai+$von
        ]);
        $cat->delete();
        return view('User.SaveMoney.Save.comeback');

    }
}

