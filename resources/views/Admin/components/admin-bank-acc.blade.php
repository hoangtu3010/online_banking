@extends("Admin.layout.admin-layout")
@section("main")
    <table class="table">
        <thead>
        <tr>
            <th>Số tài khoản</th>
            <th>Số dư</th>
            <th>Trạng thái</th>
            <th>Người liên kết</th>
            <th colspan="2">Action</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{ $d->stk }}</td>
                <td>{{ $d->balance}}</td>
                <td>{{ $d->status }}</td>
                <td>{{ $d->owner }}</td>
                <td><a class="btn btn-outline-primary" href="{{url("admin/bankAccount/edit",["id"=>$d->id])}}">Edit</a>
                </td>
                {{--                <td><a class="btn btn-outline-primary" href="{{url("admin/bankAccount/info",["id"=>$d->id])}}">infor</a></td>--}}
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
