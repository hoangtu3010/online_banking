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
                    <h1>Roles</h1>
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
                    <form class="row needs-validation" action="{{url("admin/role/update",["id"=>$data->id])}}" method="post"
                          novalidate>
                        @csrf
                        <div class="col-md-12 flex-column pl-3">
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" id="validationCustom01" value="{{$data->name}}" placeholder=" " autocomplete="off"
                                       required/>
                                <label for="validationCustom01" class="form-label">Name</label>
                                <div class="invalid-feedback">
                                    Please enter account name.
                                </div>
                            </div>

                            <div class="form-group">
                                <input name="ranker" type="number" class="form-control" id="validationCustom02" value="{{$data->ranker}}" placeholder=" "
                                       required/>
                                <label for="validationCustom02" class="form-label">Rank</label>
                                <div class="invalid-feedback">
                                    Please enter rank.
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
