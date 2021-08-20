<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResetPassWordController extends Controller
{
    public function quen_mat_khau(){
        return view("resetPassword.reset");
    }

    public function sendToEmail(Request $request){
        $email = $request->email;

        $checkUser = User::where(
            'email',$email
        )->first();

        if (!$checkUser){
            return redirect()->back()->with('error','Email này chưa được đăng kí tài khoản');
        }

        $code = bcrypt(md5(time().$email));
        $checkUser->two_factor_expires_at=Carbon::now();
        $checkUser->save();

        $url =route('resetPass',['code'=>$checkUser->two_factor_code,'email'=>$email]);

        $data=[
            'route'=>$url
        ];

        Mail::send('resetPassword.linkReset',$data,function ($message) use($checkUser){
            $message->to($checkUser->email,'okokokokok')->subject('thay đổi mật khẩu ');
        });

        return redirect()->back()->with('message','Đã gửi thông tin lên gmail thành công ');
    }

    public function resetPass(Request $request){
        $code= $request->code;
        $email=$request->email;

        $checkUser=User::where([
            'two_factor_code'=>$code,
            'email'=>$email
        ])->first();

        if (!$checkUser){
            return redirect('/')->with('error','xin loi');
        }
        return view('resetPassWord.formReset');
    }

    public function savePass(Request $request){
        $code =$request->code;
        $email = $request->email;
        $checkUser= User::where([
            "two_factor_code"=>$code,
            "email"=>$email
        ])->first();

        $checkUser->password=bcrypt($request->password);
        $checkUser->save();

        return view('resetPassword.successPass');
    }

}
