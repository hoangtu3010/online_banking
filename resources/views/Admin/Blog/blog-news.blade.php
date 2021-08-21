@extends("Admin.layout.admin-layout")
@section("main")
    <div class="bgr-head-list"></div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1>News</h1>
                </div>
                <div class="col-sm-6">
                    <div class="card-tools">
                        <form action="{{url("/admin/")}}" method="get">
                            <div class="input-group input-search">
                                <input type="text" name="table_search" class="form-control" value=""
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
                    <a href="{{url("/admin/blog/news/add-news")}}">
                        <button class="btn"><i
                                class="fas fa-plus"></i></button>
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
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Comment</th>
                    <th width="5%" colspan="2"></th>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{$item->id}}</td>
                            <td><img src="{{$item->getImage()}}"/> {{$item->title}}</td>
                            <td>{{$item->author}}</td>
                            <td>{{$item->content}}</td>
                            <td class="text-center">
                                <?php $count = 0; ?>
                                @foreach($comments as $cmt)
                                    @if($item->id == $cmt->new_id)
                                        <?php $count++; ?>
                                    @endif
                                @endforeach
                                {{$count}}
                            </td>
                            <td class="p-1">
                                <a href="{{url("/admin/blog/news/edit", ["id"=>$item->id])}}"><i
                                        class="ion-compose edit"></i></a>
                            </td>
                            <td class="p-3">
                                <a href="{{url("/admin/blog/news/delete", ["id"=>$item->id])}}"><i
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
