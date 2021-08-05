@extends("layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <div class="container">
            <h2>người gửi</h2>
            <h3>STK: {{ $data->stk }}</h3>
            <h3>Số dư: {{ $data->balance}}</h3>
            <h3>Trạng thái{{ $data->status }}</h3>

            <h3>Số tiền chuyển:{{ $money }}</h3>
            <h3>lời nhắn:{{ $message }}</h3>


            <h2>người nhận</h2>
            <h3>STK: {{ $getter->stk }}</h3>
            @if($getter->user)
                <h3>Tên:{{$getter->user->name}} </h3>
            @else
                <h3>Chưa liên kết account</h3>
            @endif
            <p><a class="btn btn-outline-primary" href="{{url("admin/bankAccount/accept",["id"=>$data->id])}}">Accept</a></p>
            <p><a class="btn btn-outline-primary" href="{{url("admin/bankAccount")}}">Home</a></p>
        </div>
    </div>
@endsection
