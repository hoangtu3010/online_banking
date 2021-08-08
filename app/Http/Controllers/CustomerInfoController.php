<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomerInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerInfoController extends Controller
{
    public function CustomerInfo()
    {
        $item = DB::table("users")->leftJoin("customer_info as c", "users.id", "=", "c.user_id")
            ->select("users.*", "c.name as cusName", "c.birthday", "c.tel", "c.cmnd", 'c.id', 'c.user_id','c.image' )->get();
        return view('user.Infomation.Customer_info', [
            'customer' => $item
        ]);
    }

    public function edit($id)
    {
        $item = DB::table("users")->leftJoin("customer_info as c", "users.id", "=", "c.user_id")
            ->select("users.*", "c.name as cusName", "c.birthday", "c.tel", "c.cmnd", 'c.id as cusID','c.image')->get();

        $item2 = $item->where('id', '=', $id)->first();

        return view('user.Infomation.edit', [
            'customer' => $item2
        ]);
    }

    public function save(Request $request, $id)
    {
        $image = null;
        if ($request->has("image")) {
            $file = $request->file("image");
//            $fileName = $file->getClientOriginalName(); // lấy tên file
            $extName = $file->getClientOriginalExtension();// lấy đuôi file ( ví dụ như png, jpg)
            $fileName = time() . "." . $extName;
            $fileSize = $file->getSize();// lấy kích thước file
            $allow = ["png", "jpg", "jpeg", "gif"];// chỉ cho phép nhưng file này up lên
            if (in_array($extName, $allow)) { // nếu đuôi file trong danh sách cho phép
                if ($fileSize < 25000000000) { // kich thuoc nho hon 10MB
                    try {
                        $file->move("upload", $fileName); // up file len host
                        $image = $fileName;
                    } catch (\Exception $e) {
                    }

                }
            }
        }

        $item = DB::table("users")->leftJoin("customer_info as c", "users.id", "=", "c.user_id")
            ->select("users.*", "c.name as cusName", "c.birthday", "c.tel", "c.cmnd", 'c.id as cusID','c.image')->get();

        $cat = CustomerInfo::findOrFail($id);
        $cat->update([
            'name' => $request->__get('name'),
            'tel' => $request->__get('tel'),
            'cmnd' => $request->__get('cmnd'),
            'birthday' => $request->__get('birthday'),
            'image'=>$image

        ]);
        return redirect()->to("user/customer");
        /*return view('user.Infomation.Customer_info',[

        ]);*/
    }

    public function create(Request $request)
    {
        $image = null;
        if ($request->has("image")) {
            $file = $request->file("image");
//            $fileName = $file->getClientOriginalName(); // lấy tên file
            $extName = $file->getClientOriginalExtension();// lấy đuôi file ( ví dụ như png, jpg)
            $fileName = time() . "." . $extName;
            $fileSize = $file->getSize();// lấy kích thước file
            $allow = ["png", "jpg", "jpeg", "gif"];// chỉ cho phép nhưng file này up lên
            if (in_array($extName, $allow)) { // nếu đuôi file trong danh sách cho phép
                if ($fileSize < 250000000000) { // kich thuoc nho hon 10MB
                    try {
                        $file->move("upload", $fileName); // up file len host
                        $image = $fileName;
                    } catch (\Exception $e) {
                    }
                }
            }
        }
        $cat = $request->__get('user_id');
        CustomerInfo::create([
            'name' => $request->__get('name'),
            'birthday' => $request->__get('birthday'),
            'tel' => $request->__get('tel'),
            'cmnd' => $request->__get('cmnd'),
            'user_id' => $cat,

            'image'=>$image

        ]);
        return redirect()->to("user/customer");
    }

}
