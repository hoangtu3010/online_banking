@extends("Admin.layout.admin-layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">

        <div class="container">
            <a href="{{url("admin/role/add")}}" class="btn btn-outline-success">
                Add role
            </a>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Rank</th>
                    <th>Action</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->name}}</td>
                    <td>{{$d->ranker}}</td>
                    <td><a href="{{url("admin/role/edit",["id"=>$d->id])}}" class="btn btn-outline-primary"> edit</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
