@extends("Admin.layout.admin-layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <h1>Số tài khoản được làm lại mã bảo mật: {{$data->stk}}</h1>
        <h1>Mã bảo mật là: {{$new}}</h1>
    </div>
@endsection
