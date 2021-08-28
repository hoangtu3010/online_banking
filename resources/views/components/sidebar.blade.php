<?php
$userInfo = \App\Models\CustomerInfo::with("User")->get();

$cardInfo = \App\Models\BankAccount::all();
?>
<!-- CSS only -->
<link rel="stylesheet" href="{{asset('css/sidebar.css')}}">

<div class="header-sidebar">
    <a href="{{url("/admin/")}}" class="brand-link">
        <img src="{{url("imgs/logo.png")}}" alt="   Admin Logo" class="brand-image img-circle">

        <span class="brand-text"><i style="color: #fff; font-weight: 500; font-size: 1.2em">Fox</i> <i
                style="color: #f8911c; font-weight: 400; font-size: 1.2em">Banking</i></span>
    </a>
    <div class="user-panel mt-3 pb-3 mb-3">
        <div class="info">

            <a class="d-block">{{Auth::user()->name}}</a>
            <a class="brand-text">{{Auth::user()->email}}</a>
        </div>
        <div class="image">
            @foreach($userInfo as $user)
                @if($user->user_id == Auth::user()->id)
                    <img src="{{asset($user->getImage())}}" class="img-circle elevation-2" alt="User Image"
                         style="width: 60px; height: 60px">
                @endif
            @endforeach
        </div>
    </div>
</div>

<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="menu-sidebar mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <div class="sidebar-item">
                    <div class="sidebar-item-content">
                        <?php $count1 = 0; $count2 = 0 ?>
                        <p class="sidebar-content-title"><i class="fas fa-credit-card"></i> Card / Account: </p>
                        <div class="d-flex flex-column">
                            @foreach($cardInfo as $card)
                                @if($card->user_id == Auth::user()->id)
                                    <?php $count1++ ?>
                                    @if($card->level == "Main")
                                            <?php $count2++ ?>
                                        <p type="button" class="btn-check" data-toggle="modal"
                                           data-target="#exampleModalCenter">
                                            Account number
                                            <br>
                                            {{$card->stk}}
                                        </p>

                                        <p>
                                            Balance
                                            <br>
                                            {{$card->balance}}
                                        </p>
                                    @endif
                                @endif
                            @endforeach
                                @if($count2 == 0)
                                    <button type="button" class="btn-check-null" data-toggle="modal"
                                            data-target="#exampleModalCenter"> <i class="ion-plus-round"></i> </button>
                                @endif
                            <div class="count-card-acc">{{$count1}}</div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Choose account: </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="d-flex flex-column" action="{{url("/user/card-choose", ['id' => Auth::user()->id])}}"
                                          method="post">
                                        @csrf
                                        @foreach($cardInfo as $card)

                                            @if($card->user_id == Auth::user()->id && $card->level == "Main")
                                                <div class="d-flex flex-row radio-toolbar">
                                                    <input type="radio" id="radio_card{{$card->id}}" checked name="accChoose"
                                                           value="{{$card->id}}" style="transform: translateY(50%)">

                                                    <label for="radio_card{{$card->id}}">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <p>Account number: {{$card->stk}}</p>
                                                                <p>Balance: {{$card->balance}}</p>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="text" id="level" disabled name="accLevel{{$card->id}}"
                                                                       value="{{$card->level}}">
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            @endif
                                            @if($card->user_id == Auth::user()->id && $card->level == "Extra")
                                                <div class="d-flex flex-row radio-toolbar">
                                                    <input type="radio" id="radio_card{{$card->id}}" name="accChoose" value="{{$card->id}}"
                                                           style="transform: translateY(50%)">
                                                    <label for="radio_card{{$card->id}}">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <p>Account number: {{$card->stk}}</p>
                                                                <p>Balance: {{$card->balance}}</p>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="text" disabled name="accLevel{{$card->id}}"
                                                                       value="{{$card->level}}">
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-choose-card">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="sidebar-item">
                    <div class="sidebar-item-content">
                        <i class="fas fa-phone-volume"></i>
                        <a href="tel: 0999999999">
                            <button class="help-phone">
                                <span class="sidebar-content-title">Support service 24/7</span>
                                <br>
                                <span style="font-size: 1.2em; padding-left: 20px; color: #ff9800"> 0-999-999-999 </span>
                            </button>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>

