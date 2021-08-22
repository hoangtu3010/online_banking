@extends("Admin.layout.admin-layout")
@section("main")
    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1>Bank Account</h1>
                </div>
                <div class="col-sm-6">
                    <div class="card-tools">
                        <form action="{{url("/admin/bankAccount")}}" method="get">
                            <div class="input-group input-search">
                                <input type="text" name="table_search" class="form-control" value="{{$search}}"
                                       placeholder="Search by account number or owner...">
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
                        <button class="btn" style="border-radius: 20px">Create Bank Account</button>
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
                            <th>Account number</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Owner</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{ $d->stk }}</td>
                            <td>{{ $d->balance}}</td>
                            <td>{{ $d->status }}</td>
                            <td>{{ $d->owner }}</td>
                            <td class="p-1">
                                <a href="{{url("admin/bankAccount/edit", ["id"=>$d->id])}}"><i
                                        class="ion-compose edit"></i></a>
                            </td>
                            {{--                <td><a class="btn btn-outline-primary" href="{{url("admin/bankAccount/info",["id"=>$d->id])}}">infor</a></td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
