@extends("layout")
@section("main")
    <div style="text-align: center">
        <h1>Thông tin chi tiết </h1>
        <div class="row">
            <div class="col-md-6">
                Thông tin tài khoản gửi
                <h4>Số tài khoản gửi : {{$cat->stk}}</h4>
                <h4>Số tiền gửi : {{$cat->money}}</h4>
                <h4>Gói gửi tiền : {{$cat->timeSave}}</h4>
            </div>
            <div class="col-md-6">
                kết quả
                <h4>Thời gian từ lúc gửi tiền :{{$h}} giờ </h4>
                <h4>Số tiền lãi nếu chưa hoàn thành gói đăng kí : {{$lai}}</h4>
                <h7>Tiền lãi là : 1/100/giờ </h7>
                <h4>Số tiền lãi nếu hoàn thành gói đăng kí:{{$laicc}}</h4>
            </div>
        </div>
    </div>
@endsection

