@extends("layout")
@section("main")
    <div>
        <h1>Danh tài khoản người dùng đã đăng ký :</h1>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Stk</th>
                <th>Balance</th>
                <th>Save Money</th>
            </tr>
            </thead>
            <tbody>
            @foreach($listBank as $item)
                @if($item->user_id==Auth::user()->id)
                    <tr>
                        <th>{{$item->stk}}</th>
                        <th>{{$item->balance}}</th>
                        <th>
                            <a href="{{url('user/saveMoney/choose',['id'=>$item->id])}}">Gửi tiền</a>
                        </th>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
