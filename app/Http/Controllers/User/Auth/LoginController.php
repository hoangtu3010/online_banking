<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function login(Request $request){
        $lock=[];
        $all_email= User::all();
//        dd($all_email->toArray());
//        dd(Session::get("locker"));
        if ($request->method() == "GET"){
            return view("login & register.login");
        }
        $email= $request->get("email");
        $checker=User::all()->where("email","=",$email)->first();
        $pass= $request->get("password");
//        dd($checker->toArray());
        if (Auth::guard("admin")->attempt(["email"=>$email,"password"=>$pass])){
            return redirect()->to("admin");
        }
        else if (Auth::guard("user")->attempt(["email"=>$email,"password"=>$pass,"status"=>"Active"])){
            if (Session::has("locker")){
                $lock =Session::get("locker");
            }
            if ($this->checkLock($lock,$checker)){
                for ($i=0;$i<count($lock);$i++){
                    if ($lock[$i]->email==$checker->email){
                        $lock[$i]->count= 0;
                    }
                }
            }
            Session::put("locker",$lock);
            return redirect()->to("user");
        }else if (Auth::guard("user")->attempt(["email"=>$email,"password"=>$pass])){
            return redirect()->back()->withErrors(['Tài khoản đã bị khóa', 'MSG']);
        }else{
            foreach ($all_email as $one){
                if ($one->email===$checker->email){
                    if (Session::has("locker")){
                        $lock =Session::get("locker");
                    }
                    if (!$this->checkLock($lock,$checker)){
                        $checker->count=1;
                        $lock[]=$checker;
                    }else{
                        for ($i=0;$i<count($lock);$i++){
                            if ($lock[$i]->email==$checker->email){
                                $lock[$i]->count= $lock[$i]->count+1;
                            }
                            if ($lock[$i]->count>=3){
                                $id = $lock[$i]->id;
                                $ban=User::findOrFail($id);
//                                dd($ban);
                                $ban->update([
                                   "status"=>"Inactive"
                                ]);
                            }
                        }
                    }
                    Session::put("locker",$lock);
                }
            }

        }


//
//        $query = [
//            'email' => $request->get("email"),
//            'password' => $request->get("password"),
//        ];
//
//        $is_autheticated = false;
//        if (Auth::guard('user')->attempt($query)){
//            $is_autheticated = true;
//            Auth::shouldUse('user');
//        }
//
//        if ($is_autheticated){
//            $request->session()->regenerate();
//            return redirect()->to("user");
//        }
//
        return redirect()->back()->withErrors(['Sai mật khẩu', 'MSG']);;
    }
    private function checkLock($lock,$acc){
        foreach ($lock as $item){
            if ($item->email == $acc->email){
                return true;
            }
        }
        return  false;
    }
}
