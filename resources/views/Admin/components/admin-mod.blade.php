@extends("Admin.layout.admin-layout")
@section("main")
    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1>Moderation</h1>
                </div>
                <div class="col-sm-6">
                    <div class="card-tools">
                        <form action="{{url("/admin/mod")}}" method="get">
                            <div class="input-group input-search">
                                <input type="text" name="table_search" class="form-control" value="{{$search}}"
                                       placeholder="Search by name or email...">
                                <button
                                    type="submit" class="btn">
                                    <i class="ion-ios-search-strong"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-3 action-header">
                    <a href="{{url("admin/create")}}">
                        <button class="btn" style="border-radius: 20px">Add Mod</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content content-main">
        <div class="container-fluid">
            <div class="card-body table-responsive table-style">
                <table class="table table-hover table-form">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="5%" class="text-center" colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{$d->__get("name")}}</td>
                            <td>{{$d->__get("email")}}</td>
                            <td>{{$d->role->__get("name")}}</td>
                            <td class="text-center">
                                <a href="{{url("admin/setting",["id"=>$d->__get("id")])}}"><i
                                        class="ion-compose edit"></i></a>
                            </td>
                            @if(strcasecmp($d->role->__get("name") , "admin") != 0)
                                <td class="text-center">
                                    <a href="{{url("admin/delete",["id"=>$d->__get("id")])}}"><i
                                            class="ion-trash-b delete"></i></a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
