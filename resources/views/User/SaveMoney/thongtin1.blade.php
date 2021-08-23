<link rel="stylesheet" href="{{asset('css/SaveMoney.css')}}">
@extends("layout")
@section("main")
    <div style="text-align: center">
        <form action="{{url('user/saveMoney/thongtin',['id'=>$id])}}" method="post">
            @csrf
            <h3>Thông tin tài khoản gửi</h3>
            <div>
                <label for="">Id :</label>
                <input type="text" value="{{$id}}" name="id">
            </div>
            <label for="">Stk : </label>
            <input type="text" value="{{$stk}}" name="stk">

            <div>
                <label for="">Số dư</label>
                <input type="text" name="balance" value="{{$balance}}"  >
            </div>
            <div>
                <label for="">Số tiền gửi</label>
                <input type="text" name="money" value="{{$money}}">
            </div>
            <div>
                <label for="">Kì hạn</label>
                <input type="text" name="time" value="{{$time}}">
            </div>
            <div>
                <label for="">Lãi suất</label>
                <input type="text" name="interest" value="{{$interest}}">
            </div>
            {{--<input type="text" name="money" placeholder="Nhập số tiền ...">
            <p class="text-red ">{{ $errors->first('money') }}</p>
            <select name="time" id="">
                <option >Chọn thời gian gửi</option>
                <option >3 giờ </option>
                <option >6 giờ</option>
                <option >12 giờ</option>
            </select>--}}
            <button type="submit" class="btn btn-outline-primary">Gửi tiền </button>
        </form>
    </div>
@endsection
