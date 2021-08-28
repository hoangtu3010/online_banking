@extends("layout")
@section("main")
    <div style="text-align: center">
        <h1>Xác nhận thông tin gửi tiết kiệm lần cuối :</h1>
            @csrf
            {{--<h3>ID tài khoản gửi</h3>
            <input type="text" value="{{$bank->id}}" name="id" >--}}
        <h3>
            Tài khoản gửi : {{$tkg}}
        </h3>

        <h3>
            Số tiền gửi : {{$money}}
        </h3>

        <h3>
            Tên Gói {{$name_package}}
        </h3>

        <h3>
            Thời hạn gửi : {{$time_package}}
        </h3>
        <h3>
            Lãi suất gửi : {{$interest}}
        </h3>
        <h3>
            Sự cho phép : {{$desire}}
        </h3>
        <a href="{{url('user/saveMoney/otp')}}" class="btn btn-outline-primary">Xác nhận OTP</a>
    </div>
@endsection
