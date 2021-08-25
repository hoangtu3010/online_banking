<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SaveMoney;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    public function show(){
        $cat = SaveMoney::all();
        return view('Admin.Interest.list',[
            'cat'=>$cat
        ]);
    }
    public function change($id){
        $cat = SaveMoney::findOrFail($id);
        $inserest =  $cat->interest;
        return view('Admin.Interest.change',[
            'cat'=>$cat,
            'inserest'=>$inserest
        ]);
    }
    public function action(Request $request,$id){
        $x = $request->__get('interest');
        $t = $request->__get('mon');
        //     dd($t);
        $cat = SaveMoney::findOrfail($id);
        $cat->update([
            'timeSave'=>$t,
            'interest'=>$x
        ]);

        return redirect()->to('admin/manageInterest');
    }
}
