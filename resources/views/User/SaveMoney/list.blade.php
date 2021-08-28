@extends("layout")
@section("main")
    <link rel="stylesheet" href="{{asset("css/form-style.css")}}">

    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 content-header-left">
                    <a href="{{url("/user")}}">
                        <i class="button-back ion-ios-arrow-thin-left"></i>
                    </a>
                    <h1>Online savings</h1>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </section>

    <section class="content content-main">
        <div class="container-fluid">
            <div class="row online-saving">
                <div class="col-md-6">
                    <div class="save-money">
                        <a href="{{url("user/saveMoney/select")}}"><h4>Gửi tiết kiệm online</h4></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="saving-amount">
                        <a href="{{url('user/saveMoney/save')}}"><h4>Số tiền đang gửi</h4></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
