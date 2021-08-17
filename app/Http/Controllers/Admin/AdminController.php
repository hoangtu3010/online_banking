<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BankAccount;
use App\Models\CustomerInfo;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //Admin
    public function roles(){
        $data= Role::all();
        return view("Admin.mod.roles",[
            "data"=>$data
        ]);
    }
    public function addRole(){
        return view("Admin.mod.addRole");
    }
    public function saveRole(Request $request){
        Role::create([
            "name"=>$request->get("name"),
            "ranker"=>$request->get("ranker"),
        ]);
        return redirect()->to('admin/role');
    }
    public function editRole(Request $request,$id){
        $find = Role::findOrFail($id);

        return view("Admin.mod.editRole",[
            "data"=>$find
        ]);
    }
    public function deleteRole($id){
        $find = Role::findOrFail($id);
        $find->delete();
        return redirect()->to('admin/role');

    }
    public function updateRole(Request $request,$id){
        $find = Role::findOrFail($id);
        $find->update([
            "name"=>$request->get("name"),
            "ranker"=>$request->get("ranker"),
        ]);
        return redirect()->to('admin/role');
    }

    public function AdminCreate(){
        $select=Role::all();
        return view("Admin.components.admin-create",[
            "select"=>$select,
        ]);
    }
    public function saveCrateAdmin(Request $request){
//        dd($request->toArray());
        Admin::create([
            "name"=>$request->get("name"),
            "email"=>$request->get("email"),
            "password"=>bcrypt($request->get("password")),
            "role_id"=>$request->get("role_id")
        ]);
        return redirect()->to('admin/mod');
    }
    public function getPassAdmin($id){
        $find = Admin::findOrFail($id);
//        dd($find->toArray());
        return view("Admin.mod.getPassAdmin",[
            "data"=>$find
        ]);
    }
    public function saveNewPass(Request $request,$id){
        $find = Admin::findOrFail($id);
        $validate=$request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $find->update([
            "password"=>bcrypt($request->get("password"))
        ]);
        return redirect()->to('admin/mod');

    }
    public function AdminMod(){
        $get=Admin::with("role")->get();
//        dd($get);
        return view("Admin.components.admin-mod",[
            "data"=>$get
        ]);
    }
    public function AdminSetting($id){
        $get=Admin::findOrFail($id);
        $select=Role::all();
        return view("Admin.components.admin-setting-acc",[
            "data"=>$get,
            "select"=>$select
        ]);
    }
    public function saveSetting(Request $request,$id){
        $get=Admin::findOrFail($id);
//        dd($request->toArray());
        $get->update([
            "name"=>$request->get("name"),
            "email"=>$request->get("email"),
            "role_id"=>$request->get("role_id"),
            "updated_at"=>now()
        ]);
//        dd($get->toArray(),$request->toArray());
        return redirect()->to('admin/mod');
    }
    public function deleteAdmin($id){
        $get=Admin::findOrFail($id);
        $get->delete();
        return redirect()->to('admin/mod');

    }

    //Customer
    public function AdminCustomer(Request $request){
        $data=DB::table("users")->leftJoin("customer_info as a","users.id","=","a.user_id")
            ->select("users.*","a.name as CusName","a.birthday","a.tel","a.cmnd")->get();
        ;
//        dd($data);
        return view("Admin.components.admin-customer-acc",[
            "data"=>$data
        ]);
    }
    public function editAdminCustomer($id){
        $data=DB::table("users")->leftJoin("customer_info as a","users.id","=","a.user_id")
            ->select("users.*","a.name as CusName","a.birthday","a.tel","a.cmnd")->get()->where("id","=",$id)->first();
        ;
//        dd($data);
        return view("Admin.Customer.edit_cus",[
            "data"=>$data
        ]);
    }
    public function updateCus(Request $request,$id){
        $user= User::findOrFail($id);
        $user->update([
            "name"=>$request->get("name"),
            "email"=>$request->get("email"),
        ]);
        $find=CustomerInfo::find($id);
        if ($find!=[])
            $cus=$find->update([
                "name"=>$request->get("cusName"),
                "birthday"=>$request->get("birthday"),
                "tel"=>$request->get("tel"),
                "cmnd"=>$request->get("cmnd"),
            ]);

        else

            $cus=CustomerInfo::create([
                "name"=>$request->get("cusName"),
                "birthday"=>$request->get("birthday"),
                "tel"=>$request->get("tel"),
                "cmnd"=>$request->get("cmnd"),
                "user_id"=>$id
            ]);

        return redirect()->to('admin/customer');
    }
    public function getPassUser($id){
        $user= User::findOrFail($id);
        $new= random_int(10000000,99999999);
        $user->update([
            "password"=>bcrypt($new)
        ]);
        return view("Admin.Customer.getPassUser",[
            "data"=>$user,
            "new"=>$new
        ]);
    }
//    public function deleteUser($id){
//        $user= User::findOrFail($id);
////        $info= CustomerInfo::where("user_id","=",$id)->first();
////        dd($user->toArray(),$info->toArray());
////        $info->delete();
//        $user->delete();
//        return redirect()->to("admin/customer");
//    }


    //BankAcount
    public function bankAccount(){
        $data=DB::table("bank_account as b")->leftJoin("users as a","b.user_id","=","a.id")
            ->select("b.*","a.name as owner")->get();
//        dd($data->toArray());
        return view("Admin.components.admin-bank-acc",[
            "data"=>$data
        ]);
    }
    public function editBankAccount($id){
        $select=User::all();
        $data=DB::table("bank_account as b")->leftJoin("users as a","b.user_id","=","a.id")
            ->select("b.*","a.name as owner")
            ->where("b.id","=",$id)->first();
//        dd($data);
        return view("Admin.components.edit-bank-acc",[
            "data"=>$data,
            "select"=>$select
        ]);
    }
    public function napBankAccount($id){
        $select=User::all();
        $data=DB::table("bank_account as b")->leftJoin("users as a","b.user_id","=","a.id")
            ->select("b.*","a.name as owner")
            ->where("b.id","=",$id)->first();
//        dd($data);
        return view("Admin.BankAccount.bonusMoney",[
            "data"=>$data,
            "select"=>$select
        ]);
    }
    public function complete(Request $request,$id){
        $find=BankAccount::findOrFail($id);
        $money = $request->get("money");
        $balance= $find->balance;
        $find->update([
            "balance"=>$balance+$money
        ]);
        Transaction::create([
            "content"=>"Bạn đã nạp ".$money." Từ Fox Banking" ,
            "money"=>$money,
            "sender"=>"Fox Banking",
            "getter"=>$find->stk,
            "bank_account_id"=>$find->id,
            "created_at"=>now(),
            "updated_at"=>now()
        ]);
        return view("Admin.BankAccount.success");
    }
    public function getPassBank($id){
        $get=BankAccount::findOrFail($id);
        $new=random_int(100000,999999);
        $get->update([
            "password"=>bcrypt($new)
        ]);
        return view("Admin.BankAccount.getPassBank",[
            "new"=>$new,
            "data"=>$get
        ]);
    }
    public function saveBankAcc(Request $request,$id){
        $check = BankAccount::findOrFail($id);
        $check->update([
            "balance"=>$request->get("balance"),
            "user_id"=>$request->get("owner"),
            "status"=>$request->get("status")
        ]);
        return redirect()->to("admin/bankAccount");
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
        return view("Admin.components.CreateBank",[
            "data"=>$data,"pass"=>$random
        ]);
    }
    public function Active($id){
        $get= BankAccount::findOrFail($id);
        $get->update([
            "status"=>"Active"
        ]);
        return redirect()->to("admin");
    }
}
