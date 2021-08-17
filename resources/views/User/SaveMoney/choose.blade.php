<link rel="stylesheet" href="{{asset('css/SaveMoney.css')}}">
@extends("layout")
@section("main")
    <div style="text-align: center">

            <h3>Thông tin tài khoản gửi</h3>
            <label for="">Stk : </label>
            <label for="">{{$bank->stk}}</label>
            <div>
                <label for="">Số dư</label>
                <label for="">{{$bank->balance}}</label>
                <input type="text" name="bank_id" value="{{$bank->id}}" hidden >
            </div>
            <div>

            </div>

    </div>
@endsection
