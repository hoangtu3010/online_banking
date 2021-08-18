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
                <th>Thời gian lúc gửi</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($save as $item)
                <tr>
                    <th>{{$item->stk}}</th>
                    <th>{{$item->money}}</th>
                    <th>{{$item->timeSave}}</th>
                    <th>{{$item->created_at}}</th>
                    <th>
                        Kiểm tra số tiền tiết kiêm .
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

