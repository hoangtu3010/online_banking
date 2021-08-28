@extends("layout")
@section("main")
    <div style="text-align: center">
        <h1>Danh sach các tài khoản đã gửi tiền</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Số tài khoản</th>
                <th>Số tiền gửi</th>
                <th>Gói gửi</th>
                <th>Thời gian gửi</th>
                <th>Lãi suất</th>
                <th>Quyền rút tiền</th>
                <th>Thời gian lúc gửi</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($save as $item)
                <tr>
                    <th>{{$item->stk}}</th>
                    <th>{{$item->money}}</th>
                    <th>{{$item->Package->name_package}}</th>
                    <th>{{$item->Package->time_package}}</th>
                    <th>{{$item->Package->interest}}</th>
                    <th>{{$item->permission}}</th>
                    <th>{{$item->created_at}}</th>
                    <th>
                        <a href={{url('user/saveMoney/watch',['id'=>$item->id])}}>Xem số tiền</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

