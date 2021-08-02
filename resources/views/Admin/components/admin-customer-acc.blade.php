@extends("Admin.layout.admin-layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
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
                <td></td>
                <td></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection