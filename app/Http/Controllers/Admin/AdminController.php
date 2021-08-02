<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function AdminCreate(){
        //chưa viết gì
        return view("Admin.components.admin-create");
    }
    public function AdminMod(){
        $get=Admin::all();
        return view("Admin.components.admin-mod",[
            "data"=>$get
        ]);
    }
    public function AdminSetting($id){
        $get=Admin::findOrFail($id);
        return view("Admin.components.admin-setting-acc",[
            "data"=>$get
        ]);
    }
    public function AdminCustomer(Request $request){
        $data=DB::table("users")->leftJoin("customer_info as a","users.id","=","a.user_id")
            ->select("users.*","a.name as CusName","a.birthday","a.tel","a.cmnd")->get();
        ;
        return view("Admin.components.admin-customer-acc",[
            "data"=>$data
        ]);
    }
    public function createBank(){

        $get = BankAccount::all("stk","id")->max("stk");
        $random=random_int("100000","999999");

        $data = BankAccount::create([
           "stk"=> $get+1,
            "password"=>bcrypt($random),
            "balance"=>$random,
            "status"=>"Inactive",
            "user_id"=>null
        ]);
        $data2=$data->toArray();
        dd($data2);
        return view("Admin.components.CreateBank");
    }
}
