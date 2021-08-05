@extends("layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <div class="container">
            <!-- Button trigger modal -->
            <h3>STK: {{ $data->stk }}</h3>
            <h3>Số dư: {{ $data->balance}}</h3>
            <h3>Trạng thái{{ $data->status }}</h3>
            @if( $data->user==null)
            <h3>TK liên kết: Chưa liên kết</h3>
            @else
            <h3>TK liên kết: {{ $data->user->name }}</h3>
            @endif
            <p><a class="btn btn-outline-primary" href="{{url("admin/bankAccount/transfer",["id"=>$data->id])}}">Transfer</a></p>
        </div>
    </div>
@endsection
