<div class="modal fade" id="chooseAccountSavings" tabindex="-1" aria-labelledby="detailLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailLabel">Choose savings account </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="d-flex flex-column needs-validation" action="{{url('user/saveMoney/choose')}}"
                      method="get" novalidate>
                    @foreach($bankAccount as $b)
                        <div class="d-flex flex-row radio-acc-saving">
                            <input type="radio" id="radio_card_saving{{$b->id}}" name="accChooseSaving" value="{{$b->id}}"
                                   style="transform: translateY(50%)" required>
                            <label for="radio_card_saving{{$b->id}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Account number: {{$b->stk}}</p>
                                        <p>Balance: {{$b->balance}}</p>
                                    </div>
                                </div>
                            </label>
                            <div class="invalid-feedback" style="position: absolute; left: 35px;bottom: 30px; font-size: 1em;">
                                Please select an account to continue.
                            </div>
                        </div>
                    @endforeach

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-choose-card">Choose</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--@extends("layout")--}}
{{--@section("main")--}}
{{--    <div>--}}
{{--        <h1>Danh tài khoản người dùng đã đăng ký :</h1>--}}

{{--        <table class="table table-bordered">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Stk</th>--}}
{{--                <th>Balance</th>--}}
{{--                <th>Save Money</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($listBank as $item)--}}
{{--                @if($item->user_id==Auth::user()->id)--}}
{{--                    <tr>--}}
{{--                        <th>{{$item->stk}}</th>--}}
{{--                        <th>{{$item->balance}}</th>--}}
{{--                        <th>--}}
{{--                            <a href="{{url('user/saveMoney/choose',['id'=>$item->id])}}">Gửi tiền</a>--}}
{{--                        </th>--}}
{{--                    </tr>--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
{{--@endsection--}}
