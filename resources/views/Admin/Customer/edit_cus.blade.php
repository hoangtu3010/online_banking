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
                    <h1>Customer Information</h1>
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
                    <h3 class="card-title">Edit</h3>
                </div>
                <div class="card-body">
                    <form class="row needs-validation" action="{{url("admin/customer/update",["id"=>$data->id])}} " method="post"
                          novalidate>
                        @csrf
                        <div class="col-md-12 flex-column pl-3">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="validationCustom01" value="{{$data->name}}" placeholder=" " autocomplete="off"
                                       required/>
                                <label for="validationCustom01" class="form-label">Name</label>
                                <div class="invalid-feedback">
                                    Please enter account name.
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" id="validationCustom02" value="{{$data->email}}" placeholder=" "
                                       required/>
                                <label for="validationCustom02" class="form-label">Email</label>
                                <div class="invalid-feedback">
                                    Please enter account email.
                                </div>
                            </div>

                            <div class="form-group">
                                <input name="cusName" type="text" class="form-control" id="validationCustom03" value="{{$data->CusName}}" placeholder=" "
                                       required/>
                                <label for="validationCustom03" class="form-label">Customer Name</label>
                                <div class="invalid-feedback">
                                    Please enter account customer name.
                                </div>
                            </div>

                            <div class="form-group">
                                <input name="birthday" type="date" class="form-control" id="validationCustom04" value="{{$data->birthday}}" placeholder=" "
                                       required/>
                                <label for="validationCustom04" class="form-label">Birthday</label>
                                <div class="invalid-feedback">
                                    Please enter account birthday.
                                </div>
                            </div>

                            <div class="form-group">
                                <input name="tel" type="tel" class="form-control" id="validationCustom05" value="{{$data->tel}}" placeholder=" "
                                       required/>
                                <label for="validationCustom05" class="form-label">Phone number</label>
                                <div class="invalid-feedback">
                                    Please enter account tel.
                                </div>
                            </div>

                            <div class="form-group">
                                <input name="cmnd" type="text" class="form-control" id="validationCustom06" value="{{$data->cmnd}}" placeholder=" "
                                       required/>
                                <label for="validationCustom06" class="form-label">Cmnd</label>
                                <div class="invalid-feedback">
                                    Please enter account cmnd.
                                </div>
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
