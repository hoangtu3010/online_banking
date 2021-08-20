@extends("Admin.layout.admin-layout")
@section("main")
    <div class="container">
        <h3>Thông tin tài khoảng ngân hàng vừa được tạo</h3>
        <form action="{{url("admin/active",["id"=>$data->__get("id")])}}" method="post">
            @csrf

            <p>Số tài khoản:{{$data->__get("stk")}} </p>
            <p>Mã bảo mật:{{$pass}}  </p>
            <p>Số dư:{{$data->__get("balance")}}  </p>
            <p>Trạng thái: {{$data->__get("status")}} </p>
            <h5>Hãy ghi nhớ thông tin chính xác</h5>
            <br>
            <button class="btn btn-outline-primary" type="submit">Tạo tài khoản</button>
            <a href="" class="btn btn-outline-danger">Xóa tài khoản</a>
        </form>

    </div>

@endsection
