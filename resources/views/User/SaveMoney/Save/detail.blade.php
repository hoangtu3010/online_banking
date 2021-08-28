@extends("layout")
@section("main")
    <div style="text-align: center">
        <h1>Thông tin chi tiết </h1>
        <div class="row">
            <div class="col-md-6">
                Thông tin tài khoản gửi
                <h4>Số id tài khoản : {{$cat->id}}</h4>
                <h4>Số tài khoản gửi : {{$cat->stk}}</h4>
                <h4>Số tiền gửi : {{$cat->money}}</h4>
                <h4>Gói gửi tiền : {{$cat->Package->name_package}}</h4>
                <h4>Thời gian gửi tiền : {{$cat->Package->time_package}} giờ</h4>
                <h4>Thời gian gửi tiền : {{($cat->Package->interest)*100}}%</h4>
                <h4>Quyền rút tiền : {{$cat->permission}}</h4>
            </div>
            <div class="col-md-6">
                kết quả
                <h4>Thời gian từ lúc gửi tiền :{{ number_format($h, 2) }} giờ </h4>
                <h5 style="color: red">Số tiền lãi nhận đc nếu rút trước thời hạn  : {{$lai}}</h5>
                <h7>Lãi suất 1%</h7>
                <h4 style="color:green">Số tiền lãi nếu hoàn thành thời hạn :{{$laihd}}</h4>
                <h7>Lãi xuất {{$cat->Package->interest * 100}}%</h7>
                <form action="{{url('user/saveMoney/comebackMoney',['id'=>$cat->id])}}" method="post">
                    @csrf
                    <h1>Tiền thật </h1>
                    <input type="text" name="von" value="{{$cat->money}}" hidden>
                    <h4>{{$laicc}}</h4>
                    <input type="text" name="lai" value="{{$laicc}}" hidden>
                    <input type="hidden" name="time" value="{{$h}}">
                    <input type="hidden" name="time_package" value="{{$cat->Package->time_package}}">
                    <button type="submit" class="btn btn-outline-primary">Rút tiền</button>
                </form>
            </div>
        </div>
    </div>
@endsection

