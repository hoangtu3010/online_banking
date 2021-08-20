@extends("Admin.layout.admin-layout")
@section("main")
    <a href="{{url("admin/create")}}" class="btn btn-outline-danger"> create acc admin</a>
    <a href="{{url("admin/createbank")}}" class="btn btn-outline-danger"> create bank acc</a>
@endsection
