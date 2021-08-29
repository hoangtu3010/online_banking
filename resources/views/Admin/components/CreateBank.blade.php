@extends("Admin.layout.admin-layout")
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
                    <h1>Bank Account</h1>
                </div>
                <div class="col-md-6">
                    <div class="btn-inac">
                        <a href="{{url("/admin/bankAccount")}}" class="btn" style="float: left">Inactive</a>

                    </div>
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
                            <h3 class="card-title">Check Bank Account</h3>
                        </div>

                    </div>
                </div>
                <div class="card-body form-confirm">
                    <div class="form-confirm-content">
                        <form action="{{url("admin/active",["id"=>$data->__get("id")])}}" method="post">
                            @csrf
                            <p>
                                <label>Account number:</label> {{$data->__get("stk")}}
                            </p>
                            <p>
                                <label>Password:</label> {{$pass}}
                            </p>
                            <p>
                                <label>Balance:</label> {{$data->__get("balance")}}
                            </p>
                            <p>
                                <label>Status:</label> {{$data->__get("status")}}
                            </p>
                            <div class="button-form">
                                <button class="btn" type="submit" style="float: right">Active</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
