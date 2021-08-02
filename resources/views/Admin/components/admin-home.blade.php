@extends("Admin.layout.admin-layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <a href="{{asset("admin/create")}}" class="btn btn-outline-danger"> create acc admin</a>
        <a href="{{asset("admin/mod")}}" class="btn btn-outline-danger"> mod acc admin</a>
        <a href="{{asset("admin/customer")}}" class="btn btn-outline-danger"> customer acc</a>
        <a href="{{asset("admin/createbank")}}" class="btn btn-outline-danger"> create bank acc</a>
        <a href="{{asset("admin/bankAccount")}}" class="btn btn-outline-danger"> list bank acc</a>
    </div>
@endsection
