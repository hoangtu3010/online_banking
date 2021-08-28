@extends("Admin.layout.admin-layout")
@section("main")
    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Packages</h1>
                </div>
                <div class="col-sm-6 action-header">
                    <a href="{{url("admin/savings-package/add")}}">
                        <button class="btn" style="border-radius: 20px">Add Package</button>
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
                        <th>Time</th>
                        <th>Interest</th>
                        <th width="5%" colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($item as $p)
                        <tr>
                            <td>{{$p->name_package}}</td>
                            <td>{{$p->time_package}}</td>
                            <td>{{$p->interest}}</td>
                            <td>
                                <a href="{{url("admin/savings-package/edit",["id"=>$p->id])}}"><i
                                        class="ion-compose edit"></i></a>
                            </td>
                            <td>
                                <a href="{{url("admin/savings-package/delete", ["id"=>$p->id])}}"><i
                                        class="ion-trash-b delete"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
