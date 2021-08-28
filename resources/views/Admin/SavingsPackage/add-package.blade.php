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
                    <h1>Packages</h1>
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
                    <form class="row needs-validation" action="{{url("admin/savings-package/save")}}" method="post"
                          novalidate>
                        @csrf
                        <div class="col-md-12 flex-column pl-3">
                            <div class="form-group">
                                <input name="name_package" type="text" class="form-control" id="validationCustom01" value="" placeholder=" " autocomplete="off"
                                       required/>
                                <label for="validationCustom01" class="form-label">Name</label>
                                <div class="invalid-feedback">
                                    Please enter account name package.
                                </div>
                            </div>

                            <div class="form-group">
                                <input name="time_package" type="number" class="form-control" id="validationCustom02" value="" placeholder=" "
                                       required/>
                                <label for="validationCustom02" class="form-label">Time</label>
                                <div class="invalid-feedback">
                                    Please enter time package.
                                </div>
                            </div>

                            <div class="form-group">
                                <input name="interest" type="number" class="form-control" id="validationCustom03" value="" placeholder=" "
                                       required/>
                                <label for="validationCustom03" class="form-label">Interest</label>
                                <div class="invalid-feedback">
                                    Please enter interest.
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
