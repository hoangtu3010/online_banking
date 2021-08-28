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
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Confirm information</h3>
                        </div>

                    </div>
                </div>
                <div class="card-body form-confirm">
                    <div class="form-confirm-content">
                        <p>
                            <label>Account number:</label> {{$tkg}}
                        </p>
                        <p>
                            <label>Amount money:</label> {{$money}}
                        </p>
                        <p>
                            <label>Savings package:</label> {{$name_package}}
                        </p>
                        <p>
                            <label>Time:</label> {{$time_package}} hours
                        </p>
                        <p>
                            <label>Interest:</label> {{$interest * 100}}%
                        </p>
                        <p>
                            <label>Time can be retracted:</label> {{$desire}}
                        </p>
                    </div>
                </div>
                <div class="button-form">
                    <a href="{{url('user/saveMoney/otp')}}" class="btn" type="submit" style="float: right">Confirm OTP</a>
                </div>
            </div>
        </div>
    </section>
@endsection
