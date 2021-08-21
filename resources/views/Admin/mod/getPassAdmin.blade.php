@extends("Admin.layout.admin-layout")
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
                    <h1>Moderator</h1>
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
                    <h3 class="card-title">Add</h3>
                </div>
                <div class="card-body">
                    <form class="row needs-validation" action="{{url("admin/savePass",["id"=>$data->id])}}" method="post"
                          novalidate>
                        @csrf
                        <div class="col-md-12 flex-column pl-3">
                            <div class="form-group">
                                <input name="email" disabled type="email" class="form-control" id="validationCustom02" value="{{$data->email}}" placeholder=" "
                                       required/>
                                <label for="validationCustom02" class="form-label">Email</label>
                                <div class="invalid-feedback">
                                    Please enter email.
                                </div>
                            </div>

                            <div class="form-group">
                                <input name="password" type="password" class="form-control" id="validationCustom03" placeholder=" "
                                       required/>
                                <label for="validationCustom03" class="form-label">Password</label>
                                <div class="invalid-feedback">
                                    Please enter password.
                                </div>
                            </div>

                            <div class="form-group">
                                <input name="password_confirmation" type="password" class="form-control" id="validationCustom04" placeholder=" "
                                       required/>
                                <label for="validationCustom04" class="form-label">Confirm Password</label>
                                <div class="invalid-feedback">
                                    Please enter confirm password.
                                </div>
                                @if($errors->any())
                                    <p class="text-red" style="position: absolute">The password you entered does not match!</p>
                                @endif
                            </div>
                        </div>
                        <div class="button-form">
                            <button class="btn" type="submit" style="float: right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
