@extends("layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <div class="container">
            <h2>người gửi</h2>
            <h3>STK: {{ $data->stk }}</h3>
            <h3>Số dư: {{ $data->balance}}</h3>
            <h3>Trạng thái{{ $data->status }}</h3>

            <h3>Số tiền chuyển:{{ $money }} VND</h3>
            @if($money*0.05>5000)
            <h3>Phí chuyển tiền:{{ 5000 }} VND</h3>
            @else
            <h3>Phí chuyển tiền:{{ $money*0.05 }} VND</h3>
            @endif
            <h3>lời nhắn:{{ $message }}</h3>


            <h2>người nhận</h2>
            <h3>STK: {{ $getter->stk }}</h3>
            @if($getter->user)
                <h3>Tên:{{$getter->user->name}} </h3>
            @else
                <h3>Chưa liên kết account</h3>
            @endif
            <p><a class="btn btn-outline-primary" href="{{url("user/bankAccount/login")}}">Accept</a></p>
            <p><a class="btn btn-outline-primary" href="{{url("user/bankAccount")}}">Home</a></p>
        </div>
    </div>
@endsection
