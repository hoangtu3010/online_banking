@extends("layout")
@section("main")
    <link rel="stylesheet" href="{{asset("css/form-style.css")}}">

    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 content-header-left">
                    <a href="{{url("/user")}}">
                        <i class="button-back ion-ios-arrow-thin-left"></i>
                    </a>
                    <h1>Online Savings</h1>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </section>
    <section class="content content-main">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Enter the desire to send savings </h3>
                </div>
                <div class="card-body">
                    <form class="row needs-validation" action="{{url('user/saveMoney/thongtin',['id'=>$bank->id])}}" method="post"
                          novalidate>
                        @csrf
                        <div class="col-md-12 flex-column pl-3">
                            <div class="form-group">
                                <input readonly="readonly"  name="stk" type="text" class="form-control"  value="{{$bank->stk}}" placeholder=" "/>
                                <label class="form-label">Account number</label>
                            </div>

                            <div class="form-group">
                                <input readonly="readonly"  name="balance" type="text" class="form-control" value="{{$bank->balance}}" placeholder=" "/>
                                <label class="form-label">Balance</label>
                            </div>

                            <div class="form-group">
                                <input name="money" type="text" class="form-control"  value="" placeholder=" "
                                       required/>
                                <label class="form-label">Amount money</label>
                                <div class="invalid-feedback">
                                    Please enter enter the amount you want to send.
                                </div>
                            </div>

                            <div class="form-group">
                                <select name="name_package" onchange="changePackage()" id="selectPackage" class="form-control" style="cursor: pointer" required>
                                    <option selected="Selected" value="">Choose package...</option>
                                    @foreach($package as $p)
                                        <option value="{{$p->id}}"> {{$p->name_package}} </option>
                                    @endforeach
                                </select>
                                <label class="form-label">Savings package</label>

                                <div class="invalid-feedback">
                                    Please enter select savings package.
                                </div>
                            </div>

                            <div class="form-group">
                                <input name="interest" type="number" class="form-control"  readonly="readonly" id="interestResult" placeholder=" "
                                       required/>
                                <label class="form-label">Interest</label>
                            </div>

                            <div class="form-group">
                                <select name="desire" class="form-control" style="cursor: pointer" required>
                                    <option selected="Selected">Half</option>
                                    <option> Full </option>
                                </select>
                                <label class="form-label"></label>
                                <div class="invalid-feedback">
                                    Please enter select .
                                </div>
                            </div>

                        </div>
                        <div class="button-form">
                            <button class="btn" type="submit" style="float: right">Save money</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    function changePackage(){
        let val_package = document.getElementById("selectPackage").value;
        @foreach($package as $p)
            if (val_package == {{$p->id}}){
                val_package = {{$p->interest}}
            }
        @endforeach

        document.getElementById("interestResult").value = val_package;
    }
</script>
