@extends("layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <div class="container">
            <h3>{{$Title}}</h3>
            <p><a class="btn btn-outline-primary" href="{{url("admin/bankAccount")}}">Home</a></p>
        </div>
    </div>
@endsection
