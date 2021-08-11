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
        $checker=User::all()->where("email","=",$email)->first();//tìm ra thằng user có email trong input
        $pass= $request->get("password");
//        dd($checker->toArray());
        if (Auth::guard("admin")->attempt(["email"=>$email,"password"=>$pass])){

            //login admin
            return redirect()->to("admin");
        }
        else if (Auth::guard("user")->attempt(["email"=>$email,"password"=>$pass,"status"=>"Active"])){
            // login của user thằng nào acc ở active thì dc chạy vào đây
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
            //stastus ko ở active thì 100 tỉ $ là bị ban r
            return redirect()->back()->withErrors(['Tài khoản đã bị khóa', 'MSG']);
        }else{
            // từ đây là giai đoạn nhập sai mật khẩu
            foreach ($all_email as $one){
                if ($one->email===$checker->email){ // nếu email  user trong DB trùng với email dc nhập  thì chạy
                    if (Session::has("locker")){
                        // lấy ra
                        $lock =Session::get("locker");
                    }
                    if (!$this->checkLock($lock,$checker)){ // kiểm tra nếu thằng checker không có trong lock hay không
                        // đây là chưa có
                        $checker->count=1;// bắt đầu đếm
                        $lock[]=$checker; // nhét nó vào lock
                    }else{
                        // đây là đã có
                        for ($i=0;$i<count($lock);$i++){ // lặp để check từng thằng trong session
                            if ($lock[$i]->email==$checker->email){ // khi  trùng email  thì tăng 1 lần đếm
                                $lock[$i]->count= $lock[$i]->count+1;
                            }
                            if ($lock[$i]->count>=3){ // đếm đến 3 là ăn ban
                                $id = $lock[$i]->id; // lấy id của thằng ăn ban
                                $ban=User::findOrFail($id);
//                                dd($ban);
                                $ban->update([  // no comment
                                   "status"=>"Inactive"
                                ]);
                            }
                        }
                    }
                    // đẩy lại vào session
                    Session::put("locker",$lock);
                }
            }
            return redirect()->back()->withErrors(['Sai mật khẩu', 'MSG']);
        }
    }
    // thằng này  kiểm tra xem có email trong session hay chưa
    // lock là session acc là acc user
    private function checkLock($lock,$acc){
        foreach ($lock as $item){
            if ($item->email == $acc->email){
                return true;
            }
        }
        return  false;
    }
}
