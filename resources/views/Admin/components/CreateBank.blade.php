@extends("Admin.layout.admin-layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <div class="container">
            <h3>Thông tin tài khoảng ngân hàng vừa được tạo</h3>
            <p>Số tài khoản:{{$data->__get("stk")}} </p>
            <p>Mã bảo mật:{{$pass}}  </p>
            <p>Số dư:{{$data->__get("balance")}}  </p>
            <p>Trạng thái: {{$data->__get("status")}} </p>
            <h5>Hãy ghi nhớ thông tin chính xác</h5>
            <br>
            <a href="{{url("admin/active",["id"=>$data->__get("id")])}}" class="btn btn-outline-primary">Kích hoạt tài khoản</a>
            <a href="" class="btn btn-outline-danger">Xóa tài khoản</a>


        </div>

    </div>
@endsection
