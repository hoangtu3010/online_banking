@extends("layout")
@section("main")
    <link rel="stylesheet" href="{{asset("css/form-style.css")}}">

    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 content-header-left">
                    <a href="{{url()->previous()}}">
                        <i class="button-back ion-ios-arrow-thin-left"></i>
                    </a>
                    <h1>Bank Account</h1>
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
                    <h3 class="card-title">Account link</h3>
                </div>
                <div class="card-body text-center">
                    <p class="text-secondary" style="font-size: 6rem"><i class="fas fa-question"></i></p>
                    <h3>Are you sure you want to link this account?</h3>

                    <h5>
                        <p>Account number</p>
                        {{Auth::user()->stk}}</h5>
                    <h5>
                        <p>Balance</p>
                        {{Auth::user()->balance}}
                    </h5>
                    @php(Session::put("bankLink",Auth::user()))
                    <div style="margin: 20px 0">
                        <a href="{{url("user/bankAccount/link")}}" class="btn btn-outline-secondary">No</a>
                        <a href="{{url("user/bankAccount/link/accept")}}" class="btn btn-outline-success">Accept</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div>

        </div>
    </div>
@endsection
