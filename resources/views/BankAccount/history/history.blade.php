<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>

@extends("layout")
@section("main")
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <h3>Đã gửi</h3>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                 data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Stk nhận</th>
                            <th>Người nhận</th>
                            <th>Số tiền</th>
                            <th>Tiền phí</th>
                            <th>Nội dung</th>
                            <th>Thời gian</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($id_getter = null)
                        @foreach($sender as $s)
                            <tr>
                                <td>{{$s->getter}}</td>
                                @foreach($all_acc as $acc)
                                    @if($s->getter == $acc->stk )
                                        @if($acc->user )
                                            @php($id_getter = $acc->user->id)
                                            <td>{{$acc->user->name}}</td>
                                        @else
                                            <td>Chưa liên kết người dùng</td>
                                        @endif
                                    @endif
                                @endforeach
                                <td>{{$s->money}} VNĐ</td>
                                <td>
                                    @if(Auth::user()->id == $id_getter)
                                        0 VNĐ
                                    @else
                                        @if($s->money * 0.5 >= 5000)
                                            5000 VNĐ
                                        @else
                                            {{$s->money * 0.5}} VNĐ
                                        @endif
                                    @endif

                                </td>
                                <td>{{$s->content}}</td>
                                <td>{{$s->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <h3>Đã nhận</h3>
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                 data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Stk gửi</th>
                            <th>Người nhận</th>
                            <th>Số tiền</th>
                            <th>Nội dung</th>
                            <th>Thời gian</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($getter as $s)
                            <tr>
                                <td>{{$s->sender}}</td>
                                @foreach($all_acc as $acc)
                                    @if($s->getter == $acc->stk )
                                        @if($acc->user )

                                            <td>{{$acc->user->name}}</td>
                                        @else
                                            <td>Chưa liên kết người dùng</td>
                                        @endif
                                    @endif
                                @endforeach
                                <td>{{$s->money}} VNĐ</td>
                                <td>{{$s->content}}</td>
                                <td>{{$s->created_at}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
