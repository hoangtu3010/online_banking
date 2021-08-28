<div class="modal fade" id="onlineSavings" tabindex="-1" aria-labelledby="detailLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailLabel">Online Savings </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="online-saving">
                    <div class="btn-savings">
                        <a type="button" class="btn" data-toggle="modal"
                           data-target="#chooseAccountSavings"><span>Saving</span></a>
                    </div>

                    <div class="btn-savings">
                        <a class="btn" href="{{url('user/saveMoney/save')}}"><span>Sending</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('User.SaveMoney.listBank')


{{--@extends("layout")--}}
{{--@section("main")--}}
{{--    <link rel="stylesheet" href="{{asset("css/form-style.css")}}">--}}

{{--    <div class="bgr-head-list"></div>--}}

{{--    <section class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6 content-header-left">--}}
{{--                    <a href="{{url("/user")}}">--}}
{{--                        <i class="button-back ion-ios-arrow-thin-left"></i>--}}
{{--                    </a>--}}
{{--                    <h1>Online savings</h1>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="content content-main">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row online-saving">--}}
{{--                <div class="col-md-6 btn-savings">--}}
{{--                    <div class="save-money">--}}
{{--                        <a type="button" class="btn-check" data-toggle="modal"--}}
{{--                           data-target="#chooseAccountSavings"><span>Saving</span></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 btn-savings">--}}
{{--                    <div class="saving-amount">--}}
{{--                        <a href="{{url('user/saveMoney/save')}}"><span>Sending</span></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @include('User.SaveMoney.listBank')--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
