@extends("Admin.layout.admin-layout")
@section("main")
    <table class="table">
        <thead>
        <tr>
            <th>Account's name</th>
            <th>Email</th>
            <th>Customer's name</th>
            <th>Birthday</th>
            <th>Tel</th>
            <th>Cmnd</th>
            <th>Action</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{ $d->name }}</td>
                <td>{{ $d->email}}</td>
                <td>{{ $d->CusName }}</td>
                <td>{{ $d->birthday }}</td>
                <td>{{ $d->tel}}</td>
                <td>{{ $d->cmnd }}</td>
                <td><a class="btn btn-outline-primary" href="{{url("admin/customer/edit",["id"=>$d->id])}}">Edit</a>
                </td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
