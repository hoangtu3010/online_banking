<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class Cmtcontroller extends Controller
{
    //
    function saveCmt(Request $request,$id){
            Comment::create([
                "customer_name"=>$request->name,
                "user_email"=>$request->email,
                "content"=>$request->get("content"),
                "reply_id"=>$request->get("reply_id"),
                "new_id"=>$id,
            ]);
        return back();
    }
    function saveRep(Request $request,$id,$rep){
//        dd($id,$rep,$request);
            Comment::create([
                "customer_name"=>$request->name,
                "user_email"=>$request->email,
                "content"=>$request->get("content"),
                "reply_id"=>$rep,
                "new_id"=>$id,
            ]);
        return back();
    }
}
