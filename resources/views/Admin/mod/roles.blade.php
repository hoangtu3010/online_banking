@extends("Admin.layout.admin-layout")
@section("main")
    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles</h1>
                </div>
                <div class="col-sm-6 action-header">
                    <a href="{{url("admin/role/add")}}">
                        <button class="btn" style="border-radius: 20px">Add Role</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content content-main">
        <div class="container-fluid">
            <div class="card-body table-responsive table-style">
                <table class="table table-hover table-form text-center">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Rank</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{$d->name}}</td>
                            <td>{{$d->ranker}}</td>
                            <td>
                                <a href="{{url("admin/role/edit",["id"=>$d->id])}}"><i
                                        class="ion-compose edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
