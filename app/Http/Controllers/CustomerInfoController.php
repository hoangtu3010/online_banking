<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomerInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerInfoController extends Controller
{
    public function CustomerInfo(){

        $item = DB::table("users")->leftJoin("customer_info as c", "users.id", "=", "c.user_id")
            ->select("users.*", "c.name as name", "c.birthday", "c.tel", "c.cmnd",'c.id')->get();

        return view('user.Infomation.Customer_info',[
            'customer'=>$item
        ]);
    }
    public function edit($id){
        $item = DB::table("users")->leftJoin("customer_info as c", "users.id", "=", "c.user_id")
            ->select("users.*", "c.name as name", "c.birthday", "c.tel", "c.cmnd")->get();

        $item2 = $item->where('id','=',$id)->first();
        return view('user.Infomation.edit',[
            'customer'=>$item2
        ]);
    }
    public function save(Request $request,$id){
        $item = DB::table("users")->leftJoin("customer_info as c", "users.id", "=", "c.user_id")
            ->select("users.*", "c.name as name", "c.birthday", "c.tel", "c.cmnd",'c.id')->get();

        $cat =CustomerInfo::findOrFail($id);
        $cat->update([
            'name'=>$request->__get('name'),
            'tel'=>$request->__get('tel'),
            'cmnd'=>$request->__get('cmnd'),
            'birthday'=>$request->__get('birthday'),
        ]);
        return redirect()->to("user/customer");
        /*return view('user.Infomation.Customer_info',[

        ]);*/
    }

}
