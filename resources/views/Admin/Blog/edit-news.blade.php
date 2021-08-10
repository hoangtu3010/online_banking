@extends("Admin.layout.admin-layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>News</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url("/admin")}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url("/admin/news/")}}">News</a></li>
                        <li class="breadcrumb-item active">Edit News</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit</h3>
                </div>
                <div class="card-body">
                    <form class="row needs-validation" action="{{url("/admin/blog/news/update", ["id" => $news->id])}}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Title</label>
                            <input name="title" type="text" class="form-control" id="validationCustom01"
                                   value="{{$news->__get("title")}}" placeholder="Title" required/>
                            <div class="invalid-feedback">
                                Please enter title.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="formFile" class="form-label">Image</label>
                            <input name="image" class="form-control" type="file" value="{{$news->__get("image")}}"
                                   id="formFile">
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Author</label>
                            <input name="author" type="text" class="form-control" id="validationCustom02"
                                   value="{{$news->__get("author")}}" placeholder="Author" required/>
                            <div class="invalid-feedback">
                                Please enter author.
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 20px">
                            <label for="validationCustom03" class="form-label">Content</label>
                            <textarea rows="8" name="content" class="form-control" id="validationCustom03"
                                      placeholder="Content..." required>{{$news->__get("content")}}</textarea>
                            <div class="invalid-feedback">
                                Please enter content.
                            </div>
                        </div>
                        <div class="col-12" style="margin-top: 40px">
                            <a href="{{url("/admin/blog/news")}}">
                                <button class="btn btn-secondary" type="button">Back</button>
                            </a>
                            <button class="btn btn-outline-info" type="submit" style="float: right">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
