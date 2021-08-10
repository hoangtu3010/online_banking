@extends("Admin.layout.admin-layout")
@section("main")
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th colspan="2">Action</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
            <tr>
                <th>{{$d->__get("name")}}</th>
                <th>{{$d->__get("email")}}</th>
                <th>{{$d->role->__get("name")}}</th>
                <th>
                    <a class="btn btn-outline-primary" href="{{url("admin/setting",["id"=>$d->__get("id")])}}">Chỉnh
                        sửa</a>
                </th>
                <th>
                    <a class="btn btn-outline-primary" href="{{url("admin/delete",["id"=>$d->__get("id")])}}">delete</a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
