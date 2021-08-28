@extends("layout")
@section("main")
    <link rel="stylesheet" href="{{asset("css/form-style.css")}}">

    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 content-header-left">
                    <a href="{{url("user/")}}">
                        <i class="button-back ion-ios-arrow-thin-left"></i>
                    </a>
                    <h1>Online Savings</h1>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </section>
    <section class="content content-main">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">OTP Authentication</h3>
                </div>
                <div class="card-body">
                    <form id="myForm" class="row needs-validation" action="{{url('user/saveMoney/action')}}" method="post"
                          novalidate>
                        @csrf
                        <div class="col-md-12 flex-column pl-3 text-center">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{$id}}" class="form-control">
                                <input name="otp" type="text" class="form-control" id="validationCustom01" placeholder=" " autocomplete="off"
                                       required/>
                                <label for="validationCustom01" class="form-label">OTP</label>
                                <div class="invalid-feedback">
                                    Please enter OTP.
                                </div>
                            </div>
{{--                            <a href="{{url("user/bankAccount/resetOTP")}}" class="btn btn-outline-warning">Resend OTP</a>--}}
                            <button type="submit" class="btn btn-outline-info">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
