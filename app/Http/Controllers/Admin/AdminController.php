<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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
        return view("Admin.components.CreateBank");
    }
}
