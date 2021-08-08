@extends("Admin.layout.admin-layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        {{Auth::user()}}
        <a href="{{asset("admin/create")}}" class="btn btn-outline-danger"> create acc admin</a>
        <a href="{{asset("admin/mod")}}" class="btn btn-outline-danger"> mod acc admin</a>
        <a href="{{asset("admin/role")}}" class="btn btn-outline-danger"> Role</a>
        <a href="{{asset("admin/customer")}}" class="btn btn-outline-danger"> customer acc</a>
        <a href="{{asset("admin/createbank")}}" class="btn btn-outline-danger"> create bank acc</a>
        <a href="{{asset("admin/bankAccount")}}" class="btn btn-outline-danger"> list bank acc</a>
        <a href="{{asset("admin/blog/comments")}}" class="btn btn-outline-danger"> Comments</a>
        <a href="{{asset("admin/blog/news")}}" class="btn btn-outline-danger"> News</a>
    </div>
@endsection
