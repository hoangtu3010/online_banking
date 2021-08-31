<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomerInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerInfoController extends Controller
{
    public function CustomerInfo($id)
    {
        $item = CustomerInfo::where("user_id", "=", $id)->first();

//        dd($item);

        return view('User.Infomation.Customer_info', [
            'customer' => $item
        ]);
    }

    public function edit($id)
    {
        $item = CustomerInfo::where("user_id", "=", $id)->get()->first();
        return view('User.Infomation.edit', [
            'customer' => $item
        ]);
    }

    public function save(Request $request, $id)
    {
        $info = CustomerInfo::where("user_id", "=", $id)->get()->first();
        $image = $info->__get("image");
        if ($request->has("image")) {
            $file = $request->file("image");
            $extName = $file->getClientOriginalExtension();
            $fileName = time() . "." . $extName;
            $fileSize = $file->getSize();
            $allow = ["png", "jpg", "jpeg", "gif"];
            if (in_array($extName, $allow)) {
                if ($fileSize < 25000000000) {
                    try {
                        $file->move("upload", $fileName);
                        $image = $fileName;
                    } catch (\Exception $e) {
                    }

                }
            }
        }

        $info->update([
            'name' => $request->__get('name'),
            'tel' => $request->__get('tel'),
            'cmnd' => $request->__get('cmnd'),
            'address' => $request->__get('address'),
            'birthday' => $request->__get('birthday'),
            'image'=>$image,
        ]);

        Alert::success('Success', 'Update successfully!');
        return redirect()->to("user/customer/$id");
        /*return view('user.Infomation.Customer_info',[

        ]);*/
    }

    public function create(Request $request, $id)
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
            'address' => $request->__get('address'),
            'user_id' => $cat,
            'image'=>$image

        ]);
        return redirect()->to("user/customer/$id");
    }

}
