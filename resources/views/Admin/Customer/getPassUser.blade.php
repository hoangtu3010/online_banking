@extends("Admin.layout.admin-layout")
@section("main")
    <h1>Tài khoản được làm lại mật khẩu: {{$data->name}}</h1>
    <h1>Mã bảo mật là: {{$new}}</h1>
@endsection
