<link rel="stylesheet" href="{{asset('css/SaveMoney.css')}}">
@extends("layout")
@section("main")
    <div style="text-align: center">
        <form action="{{url('user/saveMoney/thongtin',['id'=>$bank->id])}}" method="post">
            @csrf
            <h3>Thông tin tài khoản gửi</h3>
            <div>
                <label for="">Id :</label>
                <input type="text" value="{{$bank->id}}" name="id">
            </div>
            <label for="">Stk : </label>
            <input type="text" value="{{$bank->stk}}" name="stk">
            <div>
                <label for="">Số dư</label>
                <input type="text" name="balance" value="{{$bank->balance}}"  >
            </div>
            <input type="text" name="money" placeholder="Nhập số tiền ...">
            <p class="text-red ">{{ $errors->first('money') }}</p>
            <select name="time" id="">
                <option >Chọn thời gian gửi</option>
                <option >3 tháng</option>
                <option >6 tháng</option>
                <option >1 năm</option>
            </select>
            <button type="submit" class="btn btn-outline-primary">Gửi tiền </button>
        </form>
    </div>
@endsection
