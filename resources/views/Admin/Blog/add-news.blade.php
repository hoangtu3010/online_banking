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
                    <h1>News</h1>
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
                    <form class="row needs-validation" action="{{url("/admin/blog/news/save")}}" method="post"
                          novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4 pr-3">
                            <div class="form-image">
                                <i class="ion-upload"></i>
                                <img src="{{asset("../upload/default.png")}}" id="img_tag" />
                                <input name="image" class="form-control input-post-image" type="file" id="inputImage">
                            </div>
                        </div>
                        <div class="col-md-8 flex-column pl-3">
                            <div class="form-group">
                                <input name="title" type="text" class="form-control" id="validationCustom01" placeholder=" " autocomplete="off"
                                        required/>
                                <label for="validationCustom01" class="form-label">Title</label>
                                <div class="invalid-feedback">
                                    Please enter title.
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="author" type="text" class="form-control" id="validationCustom02" placeholder=" " value=""
                                        required/>
                                <label for="validationCustom02" class="form-label">Author</label>
                                <div class="invalid-feedback">
                                    Please enter author.
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea rows="8" name="content" class="form-control" placeholder=" " id="validationCustom03"
                                          required></textarea>
                                <label for="validationCustom03" class="form-label">Content</label>
                                <div class="invalid-feedback">
                                    Please enter content.
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
