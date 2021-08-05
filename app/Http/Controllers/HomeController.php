<?php

namespace App\Http\Controllers;

use App\Models\CustomerInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function homeCustomer(){
        $item = DB::table("users")->leftJoin("customer_info as c", "users.id", "=", "c.user_id")
            ->select("users.*", "c.name as name", "c.birthday", "c.tel", "c.cmnd")->get();

        return view('home',[
            "customers" => $item
        ]);
    }
}
