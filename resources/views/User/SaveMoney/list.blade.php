<link rel="stylesheet" href="{{asset('css/SaveMoney.css')}}">
@extends("layout")
@section("main")
    <div class="container">
        <div class="row">
            {{--<div>
                <img src="https://bloganh.net/wp-content/uploads/2021/03/chup-anh-dep-anh-sang-min.jpg"
                     height="400px" width="100%" alt="">
            </div>--}}

            <div class="col-md-6" >
                <div>
                    <div class="saveMoney">
                        <div class="saveMoney_01">
                            <a class="saveMoney_01_01" href="{{url("user/saveMoney/select")}}"><h4>Nhân hàng đăng kí</h4> </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" >
                <div>
                    <div class="saveMoney">
                        <div class="saveMoney_01">
                            <a class="saveMoney_01_01" href=""><h4>Số tiền đang gửi</h4> </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
