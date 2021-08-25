<link rel="stylesheet" href="{{asset('css/SaveMoney.css')}}">
@extends("layout")
@section("main")
    <div style="text-align: center">
        <form action="{{url('user/saveMoney/thongtin1',['id'=>$bank->id])}}" method="post">
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
            <div>
                <label for="">Số tiền muốn gửi</label>
                <input type="text" name="money" placeholder="Nhập số tiền ...">
                <p class="text-red ">{{ $errors->first('money') }}</p>
            </div>
            <div>
                <label for="">Thời gian gửi</label>
                <select name="time" id="">
                    <option >Chọn thời gian gửi</option>
                    <option >3 giờ </option>
                    <option >6 giờ</option>
                    <option >12 giờ</option>
                </select>
            </div>
            <div>
                <label for="">Mong muốn gửi</label>
                <select name="desire" id="">
                    <option>Half</option>
                    <option>Full</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary">Gửi tiền </button>
        </form>
    </div>
@endsection
