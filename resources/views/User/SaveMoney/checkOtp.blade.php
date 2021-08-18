@extends("layout")
@section("main")
    <div>
        <form action="{{url('user/saveMoney/action')}}" method="post">
            @csrf
            <div>Id tài khoản gửi</div>
            <input hidden type="text" name="id" value="{{$id}}" class="form-control">
            <h3>Your otp</h3>
            <input type="text" name="otp" placeholder="Nhập otp">
            <p class="text-red ">{{ $errors->first('pass') }}</p>
            <button type="submit" class="btn btn-outline-primary">Xác nhận otp</button>
        </form>
    </div>
@endsection
