@extends("Admin.layout.admin-layout")
@section("main")
    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Comments</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content content-main">
        <div class="container-fluid">
            <div class="card-body table-responsive table-style">
                <table class="table table-hover table-form">
                    <thead>
                    <th>ID</th>
                    <th>Customer_Name</th>
                    <th>Email</th>
                    <th>Content</th>
                    <th>New_id</th>
                    <th width="5%"></th>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td><img src="{{$item->getImage()}}"/> {{$item->customer_name}}</td>
                            <td>{{$item->users_email}}</td>
                            <td>
                                {{$item->content}}
                            </td>
                            <td>
                                {{$item->News->id}}
                            </td>
                            <td>
                                <a href="{{url("/admin/blog/comments/delete", ["id"=>$item->id])}}"><i
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
