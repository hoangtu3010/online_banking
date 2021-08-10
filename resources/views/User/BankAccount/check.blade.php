@extends("layout")
@section("main")
    <div class="row">
        <div>
            <h3>Stk: {{Auth::user()->stk}}</h3>
            <h3>balance: {{Auth::user()->balance}}</h3>
            @php(Session::put("bankLink",Auth::user()))
            <a href="{{url("user/bankAccount/link/accept")}}" class="btn btn-outline-success">Accept</a>
            <a href="{{url("user/bankAccount/link")}}" class="btn btn-outline-primary">Back</a>
        </div>
    </div>
@endsection
