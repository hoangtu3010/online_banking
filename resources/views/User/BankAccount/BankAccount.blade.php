@extends("layout")
@section("main")
@php($i = false)
@foreach($bank as $item)
        @if($item->user_id === Auth::user()->id)
           @php( $i = true)
        @endif
    @endforeach

    @foreach($data as $d)
    @if(Auth::user()->id == $d->id)
        @if($i == true)
        <div class="container">
            <div class="row">
                <table class="table">
                    <a href="" class="btn btn-outline-primary"> Add Bank account</a>
                    <thead>
                    <tr>
                        <th>Stk</th>
                        <th>Balance</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($d->bankAccount as $b)
                    <tr>
                        <td>{{$b->stk}}</td>
                        <td>{{$b->balance}}</td>
                        <td><a href="{{url("user/bankAccount/info",["id"=>$b->id])}}" class="btn btn-outline-success">info</a></td>
                        <td><a href="{{url("user/bankAccount/history",["id"=>$b->id])}}" class="btn btn-outline-success">history</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
            <h1> Bạn chưa có liên kết? hãy ABC XYZ</h1>
            <div class="container">
                <div class="row">
                    <a href="" class="btn btn-success"> Add bank account </a>
                </div>
            </div>
        @endif
    @endif
@endforeach




@endsection
