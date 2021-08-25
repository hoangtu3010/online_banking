<?php
    use Illuminate\Support\Facades\Mail;
    use App\Mail\MailNotify;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;
?>
@extends("layout")
@section("main")
    <link rel="stylesheet" href="{{asset("css/form-style.css")}}">

    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 content-header-left">
                    <a href="{{url("user/bankAccount")}}">
                        <i class="button-back ion-ios-arrow-thin-left"></i>
                    </a>
                    <h1>Transfer</h1>
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
                    <form id="myForm" class="row needs-validation" action="{{url("user/bankAccount/loginHidden")}}" method="post"
                          novalidate>
                        @csrf
                        <div class="col-md-12 flex-column pl-3 text-center">
                            <div class="form-group">
                                <input hidden type="text" name="id" value="{{$id}}" class="form-control">
                                <input name="OTP" type="text" class="form-control" id="validationCustom01" placeholder=" " autocomplete="off"
                                       required/>
                                <label for="validationCustom01" class="form-label">OTP</label>
                                <div class="invalid-feedback">
                                    Please enter OTP.
                                </div>
                            </div>
                            <a href="{{url("user/bankAccount/resetOTP")}}" class="btn btn-outline-warning">Resend OTP</a>
                            <button type="submit" class="btn btn-outline-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{--            <form action="{{url("user/bankAccount/loginHidden")}}" method="post">--}}
{{--                @csrf--}}
{{--                <div class="form-group">--}}
{{--                    <input hidden type="text" name="id" value="{{$id}}" class="form-control">--}}
{{--                    <label for=""> Your OTP:</label>--}}
{{--                    <input type="text" name="OTP" class="form-control">--}}
{{--                    <p class="text-red ">{{ $errors->first('pass') }}</p>--}}

{{--                    <button type="submit" class="btn btn-outline-primary">submit</button>--}}
{{--                    <a href="{{url("user/bankAccount/resetOTP")}}" type="button" id="reset_otp" class="btn btn-outline-success">Reset OTP</a>--}}
{{--                    <a href="{{url("user/bankAccount")}}" class="btn btn-outline-primary">Back</a>--}}
{{--                </div>--}}
{{--            </form>--}}
@endsection
<script>

</script>
