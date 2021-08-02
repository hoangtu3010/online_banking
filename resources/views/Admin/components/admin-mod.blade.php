@extends("Admin.layout.admin-layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $d)
            <tr>
                <th>{{$d->__get("name")}}</th>
                <th>{{$d->__get("email")}}</th>
                <th></th>
                <th>
                    <a class="btn btn-outline-primary" href="{{url("admin/setting",["id"=>$d->__get("id")])}}">Chỉnh sửa</a>
                </th>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
