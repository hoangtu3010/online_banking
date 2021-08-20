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
                <h4>Số tiền lãi hiện tại : {{$lai}}</h4>
                <h7>Tiền lãi là : 5/100/giờ </h7>
                <h4>Số tiền lãi nếu hoàn thành đủ thời hạn :{{$laicc}}</h4>
            </div>
        </div>
    </div>
@endsection

