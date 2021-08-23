@extends("Admin.layout.admin-layout")
@section("main")
    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer Information</h1>
                </div>
                <div class="col-sm-6">
                    <div class="card-tools">
                        <form action="{{url("/admin/customer")}}" method="get">
                            <div class="input-group input-search">
                                <input type="text" name="table_search" class="form-control" value="{{$search}}"
                                       placeholder="Search by account name, customer name, phone or email...">
                                <button
                                    type="submit" class="btn">
                                    <i class="ion-ios-search-strong"></i>
                                </button>
                            </div>
                        </form>
                    </div>
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
                        <th>Account's name</th>
                        <th>Email</th>
                        <th>Customer's name</th>
                        <th>Birthday</th>
                        <th>Tel</th>
                        <th>Cmnd</th>
                        <th width="20%">Address</th>
                        <th class="text-center">Action</th>
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
                            <td>{{ $d->address }}</td>
                            <td class="text-center">
                                <a href="{{url("admin/customer/edit",["id"=>$d->id])}}"><i
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
