@extends("Admin.layout.admin-layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <table class="table">
            <thead>
            <tr>
                <th>Bank account</th>
                <th>Balance</th>
                <th>Status</th>
                <th>Owner</th>
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
                <td><a class="btn btn-outline-primary" href="{{url("admin/bankAccount/edit",["id"=>$d->id])}}">Edit</a></td>
{{--                <td><a class="btn btn-outline-primary" href="{{url("admin/bankAccount/info",["id"=>$d->id])}}">infor</a></td>--}}
                <td></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
